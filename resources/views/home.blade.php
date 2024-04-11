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
                            <h2 id="suhu" class="mt-3">{{ $suhu->suhu }}</h2>

                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card p-3">
                    <div class="card-body">
                        <h6 class="text-warning">pH</h6>
                        <h2 id="ph" class="mt-3">{{ $ph->ph_air }}</h2>
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

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

    function updateSuhuDisplay(suhu) {
        $('#suhu').text(suhu); // Update elemen HTML dengan ID 'suhu'
    }

    // Fungsi untuk memperbarui tampilan pH
    function updatePHDisplay(ph) {
        $('#ph').text(ph); // Update elemen HTML dengan ID 'ph'
    }
    updateSuhuDisplay(<?php echo $suhu->suhu; ?>);
    updatePHDisplay(<?php echo $ph->ph; ?>);
    // Fungsi untuk melakukan AJAX request dan mengambil data suhu terbaru
    function fetchLatestSuhu() {
        $.ajax({
            url: '/', // Endpoint yang sesuai dengan controller homeData
            method: 'GET',
            success: function(response) {
                const suhu = response.suhu; // Mengambil nilai suhu terbaru dari respons
                updateSuhuDisplay(suhu); // Memperbarui tampilan suhu
            },
            error: function(xhr, status, error) {
                console.error('Error fetching latest suhu:', error); // Menangani error jika terjadi
            }
        });
    }

    // Fungsi untuk melakukan AJAX request dan mengambil data pH terbaru
    function fetchLatestPH() {
        $.ajax({
            url: '/', // Endpoint yang sesuai dengan controller homeData
            method: 'GET',
            success: function(response) {
                const ph = response.ph; // Mengambil nilai pH terbaru dari respons
                updatePHDisplay(ph); // Memperbarui tampilan pH
            },
            error: function(xhr, status, error) {
                console.error('Error fetching latest pH:', error); // Menangani error jika terjadi
            }
        });
    }

    // setInterval(fetchLatestSuhu, 5000);
    // setInterval(fetchLatestPH, 5000);
</script>
@endsection

