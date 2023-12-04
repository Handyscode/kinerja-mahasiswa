@extends('layout/master')
@section('title', 'Login')
@section('content')
  <section class="login-section">
    <div class="container-fluid px-5 d-flex align-items-center justify-content-center" style="height: 100dvh;">
      <div class="card rounded-4 border border-light p-3" style="width: 30rem;">
        @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
            <strong>{{ $message }}</strong>
          </div>
        @endif
      
        @if ($message = Session::get('error'))
          <div class="alert alert-danger" role="alert">
            <strong>{{ $message }}</strong>
          </div>
        @endif
        <div class="card-body">
          <div class="title text-center">
            <h2 class="card-title text-uppercase" style="font-weight: 800;">Selamat Datang</h2>
            <h5 class="card-subtitle mb-2 text-body-secondary">Login untuk melanjutkan</h5>
          </div>
          <form action="/login/post" method="post" id="loginForm" class="mt-5">
            @csrf
            <div class="mb-3">
              <input type="email" name="email" id="email" class="form-control fs-6 form-control-lg" placeholder="Email">
            </div>
            <div class="mb-3">
              <input type="password" name="password" id="password" class="form-control fs-6 form-control-lg" placeholder="Password">
            </div>
            <div class="action-btn">
              <button type="submit" class="btn btn-primary btn-lg w-100">Login</button>
            </div>
          </form>
          <div class="registrasi-link mt-5 text-center">
            Belum punya akun? <a href="/register" class="text-decoration-none text-primary">Daftar Sekarang!
          </div>
        </div>
      </div>
    </div>
  </section>
@stop