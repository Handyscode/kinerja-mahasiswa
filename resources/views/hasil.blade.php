@extends('layout/master')
@section('title', 'Hasil Penilaian')
@include('layout/partials/navbar')
@section('content')
  <section class="hasil-section">
    <div class="container-fluid d-flex justify-content-center p-4" style="height: 100dvh; max-width: 60rem;">
      <div class="content-parent bg-white p-4 rounded border">
        <div class="title">
          <h1 class="fw-bold text-primary">Hasil Penilaian-mu : {{ $hasil }}</h1>
        </div>
        <div class="hasil-parent text-left mt-3">
          <div class="table-parent">
            <h2 class="title">Detail Penilaian</h2>
            <div class="d-flex align-items-center justify-content-between">
              <h5 class="nama-lengkap fw-normal">Nama : {{ $nilai->nama_depan. ' '. $nilai->nama_belakang }}</h5>
              <h5 class="universitas fw-normal">Nama Perguruan Tinggi : {{ $nilai->universitas }}</h5>
            </div>
            <table class="table text-center table-striped table-bordered">
              <thead>
                <tr>
                  <th scope="col" colspan="3">Kehadiran</th>
                  <th scope="col" colspan="3">Tugas</th>
                  <th scope="col" colspan="3">Quiz</th>
                  <th scope="col" colspan="3">UTS</th>
                  <th scope="col" colspan="3">UAS</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>Kurang</th>
                  <th>Cukup</th>
                  <th>Baik</th>

                  <th>Kurang</th>
                  <th>Cukup</th>
                  <th>Baik</th>
                  
                  <th>Kurang</th>
                  <th>Cukup</th>
                  <th>Baik</th>

                  <th>Kurang</th>
                  <th>Cukup</th>
                  <th>Baik</th>

                  <th>Kurang</th>
                  <th>Cukup</th>
                  <th>Baik</th>
                </tr>
                <tr>
                  <td>{{ number_format($nilai->nk_kurang, 2) }}</td>
                  <td>{{ number_format($nilai->nk_cukup, 2) }}</td>
                  <td>{{ number_format($nilai->nk_baik, 2) }}</td>

                  <td>{{ number_format($nilai->nt_kurang, 2) }}</td>
                  <td>{{ number_format($nilai->nt_cukup, 2) }}</td>
                  <td>{{ number_format($nilai->nt_baik, 2) }}</td>

                  <td>{{ number_format($nilai->nq_kurang, 2) }}</td>
                  <td>{{ number_format($nilai->nq_cukup, 2) }}</td>
                  <td>{{ number_format($nilai->nq_baik, 2) }}</td>

                  <td>{{ number_format($nilai->nm_kurang, 2) }}</td>
                  <td>{{ number_format($nilai->nm_cukup, 2) }}</td>
                  <td>{{ number_format($nilai->nm_baik, 2) }}</td>

                  <td>{{ number_format($nilai->nf_kurang, 2) }}</td>
                  <td>{{ number_format($nilai->nf_cukup, 2) }}</td>
                  <td>{{ number_format($nilai->nf_baik, 2) }}</td>
                </tr>
                <tr>
                  <td colspan="3" class="fw-bold">Nilai Mutu : {{ $nilai->nilai_kehadiran }}</td>
                  <td colspan="3" class="fw-bold">Nilai Mutu : {{ $nilai->nilai_tugas }}</td>
                  <td colspan="3" class="fw-bold">Nilai Mutu : {{ $nilai->nilai_quiz }}</td>
                  <td colspan="3" class="fw-bold">Nilai Mutu : {{ $nilai->nilai_uts }}</td>
                  <td colspan="3" class="fw-bold">Nilai Mutu : {{ $nilai->nilai_uas }}</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="deskripsi mt-5">
            <p>
              Penilaian mahasiswa merupakan suatu proses penting dalam dunia pendidikan tinggi yang bertujuan untuk mengukur dan mengevaluasi pencapaian akademis serta kemajuan mereka selama masa studi. Penilaian ini tidak hanya mencakup aspek pengetahuan, tetapi juga keterampilan, sikap, dan potensi pengembangan diri mahasiswa. Adanya penilaian ini bertujuan untuk memberikan umpan balik kepada mahasiswa, dosen, dan lembaga pendidikan, sehingga dapat meningkatkan kualitas pendidikan secara keseluruhan.
            </p>

            <p>
              Pentingnya penilaian mahasiswa terletak pada fungsinya sebagai alat untuk mengukur pemahaman dan penguasaan materi yang diajarkan dalam kurikulum. Dosen sebagai penyelenggara pendidikan memiliki tanggung jawab untuk menyusun soal ujian, tugas, dan proyek yang relevan dengan tujuan pembelajaran. Penilaian ini juga mencakup partisipasi aktif mahasiswa dalam diskusi, presentasi, dan kegiatan kelas lainnya.
            </p>

            <p>
              Penilaian tidak hanya melibatkan aspek teknis, tetapi juga nilai-nilai etika dan integritas. Sebagai contoh, mahasiswa kedokteran dapat dinilai tidak hanya berdasarkan keterampilan klinisnya tetapi juga etika dalam berinteraksi dengan pasien. Sikap positif terhadap pembelajaran, seperti keinginan untuk terus belajar dan berkembang, juga menjadi faktor penilaian penting dalam membentuk karakter mahasiswa.
            </p>

            <p>
              Penilaian bukan hanya berfungsi sebagai alat evaluasi, tetapi juga sebagai sarana motivasi. Mahasiswa yang mendapatkan umpan balik positif cenderung lebih termotivasi untuk terus belajar dan meningkatkan kinerja akademisnya. Di sisi lain, umpan balik konstruktif dari dosen dapat menjadi panduan bagi mahasiswa dalam mengidentifikasi kelemahan dan mengembangkan potensi mereka.
            </p>

            <p>
              Dalam konteks penilaian, transparansi dan objektivitas sangat penting. Lembaga pendidikan perlu menyusun kebijakan yang jelas terkait kriteria penilaian, bobot nilai, dan prosedur penilaian. Dengan demikian, penilaian mahasiswa dapat menjadi instrumen yang efektif dalam mencapai tujuan pendidikan tinggi, yaitu menciptakan lulusan yang kompeten dan siap menghadapi tantangan di dunia kerja.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection