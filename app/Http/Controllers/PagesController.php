<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index(){
        return view('index');
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function dashboard(){
        $mahasiswa = DB::table('tbl_mahasiswa')->where('nim', Auth::user()->nim)->first();
        return view('dashboard', ['mahasiswa' => $mahasiswa]);
    }

    public function prediksiNilai(){
        return view('prediksi');
    }

    public function hasilPenilaian($kd){
        $mahasiswa = DB::table('tbl_mahasiswa')->where('nim', Auth::user()->nim)->first();
        $nilai = DB::table('tbl_kelompok')
                ->join('tbl_mahasiswa', 'tbl_kelompok.nim', '=', 'tbl_mahasiswa.nim')
                ->join('tbl_penilaian', 'tbl_kelompok.kd_penilaian', '=', 'tbl_penilaian.kd_penilaian')
                ->select('tbl_kelompok.*', 'tbl_mahasiswa.nama_depan', 'tbl_mahasiswa.nama_belakang', 'tbl_mahasiswa.universitas', 'tbl_penilaian.tanggalnilai', 'tbl_penilaian.nilai_kehadiran', 'tbl_penilaian.nilai_tugas', 'tbl_penilaian.nilai_quiz', 'tbl_penilaian.nilai_uts', 'tbl_penilaian.nilai_uas')->where('tbl_kelompok.kd_kelompok', $kd)->first();
        
        $arrKehadiran = ['nk_kurang' => $nilai->nk_kurang, 'nk_cukup' => $nilai->nk_cukup, 'nk_baik' => $nilai->nk_baik];
        $maxKehadiran = max($arrKehadiran);
        $nilaiKehadiran = array_search($maxKehadiran, $arrKehadiran);
        
        $arrTugas = ['nt_kurang' => $nilai->nt_kurang, 'nt_cukup' => $nilai->nt_cukup, 'nt_baik' => $nilai->nt_baik];
        $maxTugas = max($arrTugas);
        $nilaiTugas = array_search($maxTugas, $arrTugas);
        
        $arrQuiz = ['nq_kurang' => $nilai->nq_kurang, 'nq_cukup' => $nilai->nq_cukup, 'nq_baik' => $nilai->nq_baik];
        $maxQuiz = max($arrQuiz);
        $nilaiQuiz = array_search($maxQuiz, $arrQuiz);
        
        $arrUTS = ['nm_kurang' => $nilai->nm_kurang, 'nm_cukup' => $nilai->nm_cukup, 'nm_baik' => $nilai->nm_baik];
        $maxUTS = max($arrUTS);
        $nilaiUTS = array_search($maxUTS, $arrUTS);
        
        $arrUAS = ['nf_kurang' => $nilai->nf_kurang, 'nf_cukup' => $nilai->nf_cukup, 'nf_baik' => $nilai->nf_baik];
        $maxUAS = max($arrUAS);
        $nilaiUAS = array_search($maxUAS, $arrUAS);

        $arrAllNilai = [
            substr($nilaiKehadiran, 3),
            substr($nilaiTugas, 3),
            substr($nilaiQuiz, 3),
            substr($nilaiUTS, 3),
            substr($nilaiUAS, 3)
        ];

        $baik = count(array_keys($arrAllNilai, 'baik'));
        $cukup = count(array_keys($arrAllNilai, 'cukup'));
        $kurang = count(array_keys($arrAllNilai, 'kurang'));

        if ($baik >= 3 && $kurang == 0) {
            $hasil = 'A';
        }elseif($baik <= 2 && $cukup <= 3 || $baik <= 4 && $kurang <= 1){
            $hasil = 'B';
        }elseif($cukup >= 3 && $baik <= 1 || $baik <= 3 && $kurang <= 2){
            $hasil = 'C';
        }elseif($cukup <= 3 && $kurang >= 2 && $baik == 0){
            $hasil = 'D';
        }elseif($kurang >= 3 && $cukup <= 2 && $baik == 0){
            $hasil = 'E';
        }else{
            $hasil = 'C';
        }

        return view('hasil', ['nilai' => $nilai, 'hasil' => $hasil, 'mahasiswa' => $mahasiswa]);
    }

    public function laporanPenilaian(){
        $mahasiswa = DB::table('tbl_mahasiswa')->where('nim', Auth::user()->nim)->first();
        $nilai = DB::table('tbl_kelompok')
            ->join('tbl_mahasiswa', 'tbl_kelompok.nim', '=', 'tbl_mahasiswa.nim')
            ->join('tbl_penilaian', 'tbl_kelompok.kd_penilaian', '=', 'tbl_penilaian.kd_penilaian')
            ->select('tbl_kelompok.*', 'tbl_mahasiswa.nama_depan', 'tbl_mahasiswa.nama_belakang', 'tbl_penilaian.tanggalnilai', 'tbl_penilaian.nilai_kehadiran', 'tbl_penilaian.nilai_tugas', 'tbl_penilaian.nilai_quiz', 'tbl_penilaian.nilai_uts', 'tbl_penilaian.nilai_uas')->paginate(5);
        
        
        return view('laporan', ['nilai' => $nilai, 'mahasiswa' => $mahasiswa]);
    }
}
