@extends('layout.prodi')
@section('title', 'Course Voting - Prodi Dashboard')

@section('content')
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content text-center">
            <div class="max-w-2xl">
                <h1 class="text-4xl font-bold">Hello, {{Auth::user()->name}}</h1>
                <h1 class="text-lg font-bold py-2">Selamat datang di halaman Program Studi internal scholarships</h1>
                <p class="py-6">Selamat datang! Untuk panduan penggunaan dapat menghubungi admin </p>
            </div>
        </div>
    </div>
@endsection
