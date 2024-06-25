@extends('layout.layout')
@section('title', 'Course Voting - User Dashboard')

@section('content')
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content text-center">
            <div class="max-w-2xl">
                <h1 class="text-4xl font-bold">Hello, {{Auth::user()->name}}</h1>
                <h1 class="text-lg font-bold py-2">Selamat datang di halaman internal scholarships</h1>
                <p class="py-6">Selamat datang di halaman internal scholarships, {{Auth::user()->name}}! Ini adalah tempat di mana Anda dapat memberikan suara Anda untuk kelas yang ingin diadakan. Kami senang Anda bergabung dengan kami dalam memilih kelas yang paling sesuai dengan kebutuhan dan minat Anda.</p>
            </div>
        </div>
    </div>
@endsection
