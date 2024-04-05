@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="image-container">
                <img src="{{ asset('images/home.png') }}" class="img-fluid" alt="Deskripsi Gambar">
                <p class="image-text">Selamat Datang, Mitra</p>
                <p class="image-text-1">Dissuade ecstatic and properly saw entirely sir why laughter endeavor. In on my
                    jointure
                    horrible margaret suitable he
                    speedily.</p>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <h1 class="text-white text-center mt-3 mb-4">Daily Report</h1>
            <div class="col-md-4 mb-3">
                <div class="card p-3">
                    <div class="card-body">
                        <h6 class="text-warning">Temperature</h6>
                        <h2 class="mt-3">25.5</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card p-3">
                    <div class="card-body">
                        <h6 class="text-warning">pH</h6>
                        <h2 class="mt-3">25.5</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card p-3">
                    <div class="card-body">
                        <h6 class="text-warning">ppM</h6>
                        <h2 class="mt-3">25.5</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
