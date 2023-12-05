@extends('layout/master')
@section('title', 'Website Prediksi Kinerja Mahasiswa')
@include('layout/partials/navbar')
@section('content')
  <section class="hero-section">
    <div class="container-fluid px-5 h-100 d-flex align-items-center justify-content-center">
      <div class="hero-headline text-center">
        <h1 style="font-size: 56px; font-weight: 800;">Aplikasi Penilaian <br> <span class="text-primary">Mahasiswa</span></h1>
        <div class="cta-button mt-3">
          @if (Auth::user()->level == 'admin')
            <a href="/laporan-penilaian" class="btn btn-outline-primary btn-lg fs-4">Laporan Penilaian</a>
          @else
            <a href="/prediksi-nilai" class="btn btn-primary btn-lg fs-4">Hitung Penilaian</a>
          @endif
        </div>
      </div>
    </div>
  </section>
@stop