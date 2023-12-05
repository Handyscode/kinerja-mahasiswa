@extends('layout/master')
@section('title', 'Hitung Nilai')
@section('content')
  <section class="prediksi-section">
    <div class="container-fluid px-5 d-flex align-items-center justify-content-center" style="height: 100dvh;">
      <div class="card rounded-4 border border-light p-3" style="width: 30rem;">
        <div class="card-body">
          <div class="title text-center">
            <h2 class="card-title text-uppercase" style="font-weight: 800;">Hitung Penilaian Mahasiswa</h2>
            <h5 class="card-subtitle mb-2 text-body-secondary">Hitung penilaian kuliahmu</h5>
          </div>
          @if ($message = Session::get('error'))
            <div class="alert alert-danger" role="alert">
              <strong>{{ $message }}</strong>
            </div>
          @endif
          <form action="/prediksi-nilai/store" method="post" id="loginForm" class="mt-5">
            @csrf
            <div class="mb-3">
              <input type="number" name="kehadiran" id="kehadiran" class="form-control fs-6 form-control-lg" placeholder="Jumlah Kehadiran" required maxlength="2">
              <div id="kehadiranHelp" class="form-text text-danger">*Jumlah kehadiran dihitung dari total 14 pertemuan.</div>
            </div>
            <div class="mb-3 d-flex gap-3 nilai-tugas">
              <div class="inputs">
                <div class="input-group">
                  <input type="number" name="tugas[]" id="tugas" class="form-control fs-6 form-control-lg" placeholder="Nilai Tugas" required maxlength="3">
                </div>
                <div id="kehadiranHelp" class="form-text text-danger">*Data yang dihitung adalah rata-rata dari keseluruhan nilai.</div>
              </div>
              <div class="action-btn d-flex gap-3" style="height: 40px;">
                <button type="button" class="btn btn-primary btn-add">+</button>
                <button type="button" class="btn btn-outline-primary btn-remove d-none">-</button>
              </div>
            </div>
            <div class="mb-3 d-flex gap-3 nilai-quiz">
              <div class="inputs">
                <div class="input-group">
                  <input type="number" name="quiz[]" id="quiz" class="form-control fs-6 form-control-lg" placeholder="Nilai Quiz" required maxlength="3">
                </div>
                <div id="kehadiranHelp" class="form-text text-danger">*Data yang dihitung adalah rata-rata dari keseluruhan nilai.</div>
              </div>
              <div class="action-btn d-flex gap-3" style="height: 40px;">
                <button type="button" class="btn btn-primary btn-add">+</button>
                <button type="button" class="btn btn-outline-primary btn-remove d-none">-</button>
              </div>
            </div>
            <div class="mb-3">
              <div class="input-group">
                <input type="number" name="uts" id="uts" class="form-control fs-6 form-control-lg" placeholder="Jumlah Nilai UTS" required maxlength="3">
                <input type="number" name="uas" id="uas" class="form-control fs-6 form-control-lg" placeholder="Jumlah Nilai UAS" required maxlength="3">
              </div>
            </div>
            <div class="action-btn">
              <button type="submit" class="btn btn-primary btn-lg w-100">Hitung Penilaian</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@stop

@section('script')
  <script src="{{ asset('/assets/js/prediksi.js') }}"></script>
@stop