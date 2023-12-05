<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class FunctionController extends Controller
{
    public function storeRegister(Request $request) {
        $validated = $request->validate([
            'nim' => 'required',
            'namaDepan' => 'required',
            'namaBelakang' => 'required',
            'email' => 'required|email',
            'tgLahir' => 'required',
            'nohp' => 'required|min:10|max:13',
            'universitas' => 'required',
            'password' => 'required|confirmed',
        ]);

        try{
            DB::table('tbl_mahasiswa')->insert([
                'nim' => $validated['nim'],
                'nama_depan' => $validated['namaDepan'],
                'nama_belakang' => $validated['namaBelakang'],
                'tgl_lahir' => $validated['tgLahir'],
                'email' => $validated['email'],
                'universitas' => $validated['universitas'],
                'nohp' => $validated['nohp'],
            ]);

            DB::table('tbl_akses')->insert([
                'nim' => $validated['nim'],
                'level' => 'mahasiswa',
                'password' => Hash::make($validated['password']),
            ]);
            return redirect('/login')->with('success', 'Registrasi Berhasil, Silahkan Login');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function storeLogin(Request $request){
        $validated = $request->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->with('error', 'Credentials not matched');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function hitungNilai(Request $request){
        $validated = $request->validate([
            'kehadiran' => 'required',
            'tugas' => 'required',
            'quiz' => 'required',
            'uts' => 'required',
            'uas' => 'required'
        ]);

        $jumlahTugas = array_sum($request->get('tugas'));
        $avgTugas = $jumlahTugas / count($request->get('tugas'));
        
        $jumlahQuiz = array_sum($request->get('quiz'));
        $avgQuiz = $jumlahQuiz / count($request->get('quiz'));

        $date = Carbon::now()->isoFormat('Y-MM-D');
        $lastPenilaianId = DB::table('tbl_penilaian')->select('kd_penilaian')->orderBy('kd_penilaian', 'desc')->first();
        if ($lastPenilaianId == null) {
            $kdnilai = "P001";
        } else {
            $lastIncrement = substr($lastPenilaianId->kd_penilaian, -3);
            $kdnilai = 'P' . str_pad($lastIncrement + 1, 3, 0, STR_PAD_LEFT);
        }

        try {
            DB::table('tbl_penilaian')->insert([
                'kd_penilaian' => $kdnilai,
                'nim' => Auth::user()->nim,
                'tanggalnilai' => $date,
                'nilai_kehadiran' => $request->get('kehadiran'),
                'nilai_tugas' => $avgTugas,
                'nilai_quiz' => $avgQuiz,
                'nilai_uts' => $request->get('uts'),
                'nilai_uas' => $request->get('uas')
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        $lastKelompokId = DB::table('tbl_kelompok')->select('kd_kelompok')->orderBy('kd_kelompok', 'desc')->first();
        if ($lastKelompokId == null) {
            $kdkelompok = "K001";
        } else {
            $lastIncrement = substr($lastKelompokId->kd_kelompok, -3);
            $kdkelompok = 'K' . str_pad($lastIncrement + 1, 3, 0, STR_PAD_LEFT);
        }

        // Calculate Nilai Kehadiran
        $nk_kurang = $this->getNkKurang($request->get('kehadiran'));
        $nk_cukup = $this->getNkCukup($request->get('kehadiran'));
        $nk_baik = $this->getNkBaik($request->get('kehadiran'));

        // Calculate Nilai Tugas
        $nt_kurang = $this->getNtKurang($avgTugas);
        $nt_cukup = $this->getNtCukup($avgTugas);
        $nt_baik = $this->getNtBaik($avgTugas);

        // Calculate Nilai Quiz
        $nq_kurang = $this->getNqKurang($avgQuiz);
        $nq_cukup = $this->getNqCukup($avgQuiz);
        $nq_baik = $this->getNqBaik($avgQuiz);

        // Calculate Nilai UTS
        $nm_kurang = $this->getNmKurang($request->get('uts'));
        $nm_cukup = $this->getNmCukup($request->get('uts'));
        $nm_baik = $this->getNmBaik($request->get('uts'));

        // Calculate Nilai UAS
        $nf_kurang = $this->getNfKurang($request->get('uas'));
        $nf_cukup = $this->getNfCukup($request->get('uas'));
        $nf_baik = $this->getNfBaik($request->get('uas'));

        try {
            // Insert Data Kelompok
            DB::table('tbl_kelompok')->insert([
                'kd_kelompok' => $kdkelompok,
                'kd_penilaian' => $kdnilai,
                'nim' => Auth::user()->nim,
                'nk_kurang' => number_format($nk_kurang, 2),
                'nk_cukup' => number_format($nk_cukup, 2),
                'nk_baik' => number_format($nk_baik, 2),
                'nt_kurang' => number_format($nt_kurang, 2),
                'nt_cukup' => number_format($nt_cukup, 2),
                'nt_baik' => number_format($nt_baik, 2),
                'nq_kurang' => number_format($nq_kurang, 2),
                'nq_cukup' => number_format($nq_cukup, 2),
                'nq_baik' => number_format($nq_baik, 2),
                'nm_kurang' => number_format($nm_kurang, 2),
                'nm_cukup' => number_format($nm_cukup, 2),
                'nm_baik' => number_format($nm_baik, 2),
                'nf_kurang' => number_format($nf_kurang, 2),
                'nf_cukup' => number_format($nf_cukup, 2),
                'nf_baik' => number_format($nf_baik, 2)
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect('/hasil-penilaian'.'/'.$kdkelompok);
    }

    public function getPenilaian(Request $request){
        $kehadiran = 'nk_'.$request->get('kehadiran');
        $tugas = 'nt_'.$request->get('tugas');

        $getMahasiswa = DB::table('tbl_mahasiswa')->join('tbl_kelompok', 'tbl_mahasiswa.nim', '=', 'tbl_kelompok.nim')->select('tbl_mahasiswa.nim', 'tbl_mahasiswa.nama_depan', 'tbl_mahasiswa.nama_belakang', 'tbl_kelompok.'.$kehadiran, 'tbl_kelompok.'.$tugas)->get();

        // while ($getPenilaian) {
        //     $c1 = $getPenilaian;
        //     $c1 = $ux[$row['nk_baik']];
        //     $c2 = $ux[$row['nt_baik']];
        //     return response()->json($row);
        // }
        $nilai = [];
        for ($i=0; $i < count($getMahasiswa); $i++) { 
            $c1 = $getMahasiswa[$i]->$kehadiran;
            $c2 = $getMahasiswa[$i]->$tugas;
            
            if ($request->get('operator') == 'AND') {
                $formattedNumber = number_format(min($c1, $c2), 2);
            }elseif($request->get('operator') == 'OR'){
                $formattedNumber = number_format(max($c1, $c2), 2);
            }
            
            array_push($nilai, [$getMahasiswa[$i]->nim, $getMahasiswa[$i]->nama_depan, $getMahasiswa[$i]->nama_belakang, $formattedNumber]);
            // $c2 = $ux[$getPenilaian[$i]->nt_baik];
        }

        $final = [];
        for ($j=0; $j < count($nilai); $j++) { 
            if ($nilai[$j][3] != 0) {
                array_push($final, [$nilai[$j][0], $nilai[$j][1], $nilai[$j][2], $nilai[$j][3]]);
            }
        }
        return response()->json($final);
    }

    // Function Nilai Kehadiran Kurang
    private function getNkKurang($kehadiran){
        if ($kehadiran >= 7) {
            $nk_kurang = 0;
        }elseif(4 <= $kehadiran && $kehadiran <= 7){
            $nk_kurang = (7-$kehadiran)/(7-4);
        }elseif($kehadiran <= 4){
            $nk_kurang = 1;
        }

        return $nk_kurang;
    }
    // Function Nilai Kehadiran Cukup
    private function getNkCukup($kehadiran){
        if ($kehadiran <= 4 || $kehadiran >= 14) {
            $nk_cukup = 0;
        }elseif(4 <= $kehadiran && $kehadiran <= 7){
            $nk_cukup = ( $kehadiran - 4 )/( 7-4 );
        }elseif(7 <= $kehadiran && $kehadiran <= 14){
            $nk_cukup = ( 14 - $kehadiran )/( 14 - 7 );
        }

        return $nk_cukup;
    }
    // Function Nilai Kehadiran Baik
    private function getNkBaik($kehadiran){
        if ($kehadiran <= 7) {
            $nk_baik = 0;
        }elseif(7 <= $kehadiran && $kehadiran <= 14){
            $nk_baik = ( $kehadiran - 7 )/( 14 - 7 );
        }elseif($kehadiran >= 14){
            $nk_baik = 1;
        }

        return $nk_baik;
    }
    
    // Function Nilai Tugas Kurang
    private function getNtKurang($tugas){
        if ($tugas >= 70) {
            $nt_kurang = 0;
        }elseif(50 <= $tugas && $tugas <= 70){
            $nt_kurang = (70 - $tugas)/(70 - 50);
        }elseif($tugas <= 50){
            $nt_kurang = 1;
        }

        return $nt_kurang;
    }
    // Function Nilai Tugas Cukup
    private function getNtCukup($tugas){
        if ($tugas <= 60 || $tugas >= 90) {
            $nt_cukup = 0;
        }elseif(60 <= $tugas && $tugas <= 75){
            $nt_cukup = ($tugas - 60)/(75 - 60);
        }elseif(75 <= $tugas && $tugas <= 90){
            $nt_cukup = (90-$tugas) / (90-75);
        }

        return $nt_cukup;
    }
    // Function Nilai Tugas Baik
    private function getNtBaik($tugas){
        if ($tugas <= 80) {
            $nt_baik = 0;
        }elseif(80 <= $tugas && $tugas <= 100){
            $nt_baik = ($tugas - 80)/(100 - 80);
        }elseif($tugas >= 100){
            $nt_baik = 1;
        }

        return $nt_baik;
    }

    // Function Nilai Quiz Kurang
    private function getNqKurang($quiz){
        if ($quiz >= 70) {
            $nq_kurang = 0;
        }elseif(50 <= $quiz && $quiz <= 70){
            $nq_kurang = (70 - $quiz)/(70 - 50);
        }elseif($quiz <= 50){
            $nq_kurang = 1;
        }

        return $nq_kurang;
    }
    // Function Nilai Quiz Cukup
    private function getNqCukup($quiz){
        if ($quiz <= 60 || $quiz >= 90) {
            $nq_cukup = 0;
        }elseif(60 <= $quiz && $quiz <= 75){
            $nq_cukup = ($quiz - 60)/(75 - 60);
        }elseif(75 <= $quiz && $quiz <= 90){
            $nq_cukup = (90-$quiz) / (90-75);
        }

        return $nq_cukup;
    }
    // Function Nilai Quiz Baik
    private function getNqBaik($quiz){
        if ($quiz <= 80) {
            $nq_baik = 0;
        }elseif(80 <= $quiz && $quiz <= 100){
            $nq_baik = ($quiz - 80)/(100 - 80);
        }elseif($quiz >= 100){
            $nq_baik = 1;
        }

        return $nq_baik;
    }

    // Function Nilai UTS Kurang
    private function getNmKurang($uts){
        if ($uts >= 70) {
            $nm_kurang = 0;
        }elseif(50 <= $uts && $uts <= 70){
            $nm_kurang = (70 - $uts)/(70 - 50);
        }elseif($uts <= 50){
            $nm_kurang = 1;
        }

        return $nm_kurang;
    }
    // Function Nilai UTS Cukup
    private function getNmCukup($uts){
        if ($uts <= 60 || $uts >= 90) {
            $nm_cukup = 0;
        }elseif(60 <= $uts && $uts <= 75){
            $nm_cukup = ($uts - 60)/(75 - 60);
        }elseif(75 <= $uts && $uts <= 90){
            $nm_cukup = (90-$uts) / (90-75);
        }

        return $nm_cukup;
    }
    // Function Nilai UTS Baik
    private function getNmBaik($uts){
        if ($uts <= 80) {
            $nm_baik = 0;
        }elseif(80 <= $uts && $uts <= 100){
            $nm_baik = ($uts - 80)/(100 - 80);
        }elseif($uts >= 100){
            $nm_baik = 1;
        }

        return $nm_baik;
    }

    // Function Nilai UAS Kurang
    private function getNfKurang($uas){
        if ($uas >= 70) {
            $nf_kurang = 0;
        }elseif(50 <= $uas && $uas <= 70){
            $nf_kurang = (70 - $uas)/(70 - 50);
        }elseif($uas <= 50){
            $nf_kurang = 1;
        }

        return $nf_kurang;
    }
    // Function Nilai UAS Cukup
    private function getNfCukup($uas){
        if ($uas <= 60 || $uas >= 90) {
            $nf_cukup = 0;
        }elseif(60 <= $uas && $uas <= 75){
            $nf_cukup = ($uas - 60)/(75 - 60);
        }elseif(75 <= $uas && $uas <= 90){
            $nf_cukup = (90-$uas) / (90-75);
        }

        return $nf_cukup;
    }
    // Function Nilai UAS Baik
    private function getNfBaik($uas){
        if ($uas <= 80) {
            $nf_baik = 0;
        }elseif(80 <= $uas && $uas <= 100){
            $nf_baik = ($uas - 80)/(100 - 80);
        }elseif($uas >= 100){
            $nf_baik = 1;
        }

        return $nf_baik;
    }
}
