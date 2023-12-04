@extends('layout/master')
@section('title', 'Registrasi')
@section('content')
  <section class="register-section">
    <div class="container-fluid px-5 d-flex align-items-center justify-content-center" style="height: 100dvh;">
      <div class="card rounded-4 border border-light p-3" style="width: 30rem;">
        @if ($message = Session::get('error'))
          <div class="alert alert-danger" role="alert">
            <strong>{{ $message }}</strong>
          </div>
        @endif
        <div class="card-body">
          <div class="title text-center">
            <h2 class="card-title text-uppercase" style="font-weight: 800;">Registrasi</h2>
            <h5 class="card-subtitle mb-2 text-body-secondary px-3">Buat akun baru untuk mengakses fitur-fitur yang ada</h5>
          </div>
          <form action="/register/post" method="post" id="registerForm" class="mt-5">
            @csrf
            <div class="mb-3">
              <input type="tel" name="nim" id="nim" class="form-control fs-6 @error('nim') is-invalid @enderror form-control-lg" placeholder="NIM" value="{{ old('nim') }}">
              @error('nim')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group mb-3">
              <div class="row">
                <div class="col-6">
                  <input type="text" name="namaDepan" id="namaDepan" class="form-control fs-6 @error('namaDepan') is-invalid @enderror form-control-lg" placeholder="Nama Depan" value="{{ old('namaDepan') }}">
                  @error('namaDepan')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-6"><input type="text" name="namaBelakang" id="namaBelakang" class="form-control fs-6 form-control-lg @error('namaBelakang') is-invalid @enderror" placeholder="Nama Belakang" value="{{ old('namaBelakang') }}"></div>
                @error('namaBelakang')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="mb-3">
              <input type="email" name="email" id="email" class="form-control fs-6 form-control-lg @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group mb-3">
              <div class="row">
                <div class="col-6">
                  <input type="date" name="tgLahir" id="tgLahir" class="form-control fs-6 form-control-lg @error('tgLahir') is-invalid @enderror" placeholder="Tanggal Lahir" value="{{ old('tgLahir') }}">
                  @error('tgLahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-6"><input type="tel" name="nohp" id="nohp" class="form-control fs-6 form-control-lg @error('nohp') is-invalid @enderror" placeholder="Nomor Handphone" value="{{ old('nohp') }}" minlength="10" maxlength="13"></div>
                @error('nohp')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="mb-3">
              <input type="text" name="universitas" id="universitas" class="form-control fs-6 form-control-lg @error('universitas') is-invalid @enderror" placeholder="Nama Universitas" value="{{ old('universitas') }}">
              @error('universitas')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group mb-3">
              <div class="row">
                <div class="col-6">
                  <input type="password" name="password" id="password" class="form-control fs-6 form-control-lg @error('password') is-invalid @enderror" placeholder="Password">
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-6">
                  <input type="password" name="password_confirmation" id="password_confirmation" class="form-control fs-6 form-control-lg @error('password') is-invalid @enderror" placeholder="Konfirmasi Password">
                </div>
              </div>
            </div>
            <div class="action-btn">
              <button class="btn btn-primary btn-lg w-100" type="submit">Register</button>
            </div>
          </form>
          <div class="login-link mt-5 text-center">
            Sudah punya akun? <a href="/login" class="text-decoration-none text-primary">Login Sekarang!
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection