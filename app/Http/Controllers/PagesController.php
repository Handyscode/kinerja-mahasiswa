<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('dashboard');
    }

    public function prediksiNilai(){
        return view('prediksi');
    }

    public function hasilPenilaian(){
        return view('hasil');
    }
}
