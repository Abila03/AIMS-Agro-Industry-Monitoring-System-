@extends('layouts.app')

@section('title', 'Page Suhu')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-3">
            <a class="nav-link" href="">
                <div class="card bg-card-green-1 p-3">
                    <img src="{{ asset('images/icon1.png') }}" style="width: 100px; height: 100px;" alt="">
                    <h5 class="mt-3 text-white">Hasil dan Analisis</h5>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="riwayat-suhu" class="nav-link">
                <div class="card bg-card-green-1 p-3">
                    <img src="{{ asset('images/icon2.png') }}" style="width: 100px; height: 100px;" alt="">
                    <h5 class="mt-3 text-white">Riwayat</h5>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="container mt-5 text-white">
    <div class="row">
        <div class="col-md-5">
            <h2>Parameter Suhu</h2>
            <form action="" method="post">
                @csrf
                <input type="text" class="form-control mt-3 p-2" placeholder="Masukkan parameter atas" name="max_suhu" id="">
                <input type="text" class="form-control mt-3 p-2" placeholder="Masukkan parameter bawah" name="min_suhu" id="">
                <div class="row">
                    <div class="col-md-8 mt-3">
                    <div class="card p-2">
                        <h6 style="margin-top: -6px">Parameter</h6>
                        <h6 style="margin-top: -10px; margin-bottom: -4px"> <sup>o</sup>C  <sup>o</sup>C</h6>
                    </div>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-warning float-end mt-3 p-2" style="width: 7rem">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-3">
            <div class="card p-3">
                <div class="card-body text-center p-4">
                    <canvas id="suhu-terkini"></canvas>
                    <h1 id="suhu"></h1>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-1">
                <div class="card-body">
                    <canvas id="grafik-suhu"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://bernii.github.io/gauge.js/dist/gauge.min.js"></script>
<script>
    var opts = {
        angle: -0.2,
        lineWidth: 0.2,
        radiusScale: 1,
        pointer: {
            length: 0.6,
            strokeWidth: 0.024,
            color: '#000000'
        },
        limitMax: false,
        limitMin: false,
        colorStart: '#F7C35F',
        colorStop: '#F7C35F',
        strokeColor: '#EEEEEE',
        generateGradient: true,
        highDpiSupport: true,
    };

    var target = document.getElementById('suhu-terkini');
    var gauge = new Gauge(target).setOptions(opts);
    gauge.maxValue = 100;
    gauge.setMinValue(0);
    gauge.animationSpeed = 32;

    // Inisialisasi nilai awal pada gauge menggunakan nilai suhu dari PHP
    var suhu = <?php echo $latestSuhu->suhu; ?>;
    gauge.set(suhu);

    // Fungsi untuk memperbarui nilai pada gauge
    function updateGauge(suhu) {
        gauge.set(suhu); // Mengatur nilai pada gauge sesuai dengan suhu terbaru
    }

    // Fungsi untuk melakukan AJAX request dan mengambil data suhu terbaru
    function fetchLatestSuhu() {
        $.ajax({
            url: '/suhu', // Endpoint yang sesuai dengan controller latestSuhu
            method: 'GET',
            success: function(response) {
                const suhu = response.suhu; // Mengambil nilai suhu terbaru dari respons
                updateGauge(suhu); // Memperbarui nilai pada gauge
            },
            error: function(xhr, status, error) {
                console.error('Error fetching latest suhu:', error); // Menangani error jika terjadi
            }
        });
    }

    // setInterval(fetchLatestSuhu, 5000);
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    // Fungsi untuk memperbarui tampilan suhu
    function updateSuhuDisplay(suhu) {
        $('#suhu').text(suhu + ' °C'); // Update elemen HTML dengan ID 'suhu'
    }

    // Memperbarui tampilan suhu dengan nilai dari PHP
    updateSuhuDisplay(<?php echo $latestSuhu->suhu; ?>);

    function fetchLatestSuhu() {
        $.ajax({
            url: '/suhu', // Endpoint yang sesuai dengan controller latestSuhu
            method: 'GET',
            success: function(response) {
                // Proses data suhu yang diterima dari server
                const suhu = response.suhu; // Asumsikan respons JSON berisi data suhu
                updateSuhuDisplay(suhu); // Panggil fungsi untuk memperbarui tampilan suhu
            },
            error: function(xhr, status, error) {
                console.error('Error fetching latest suhu:', error); // Tangani error jika terjadi
            }
        });
    }

    // setInterval(fetchLatestSuhu, 5000);
</script>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafik-suhu');
    const labels = [];
    const suhuData = [];
    <?php
        $conn = mysqli_connect("127.0.0.1", "root" , "", "aims"); 
        $suhu = mysqli_query($conn, "SELECT waktu, suhu FROM suhu WHERE waktu >= NOW() - INTERVAL 1 DAY ORDER BY waktu ASC");
        while ($data_suhu = mysqli_fetch_array($suhu)) {
            echo "labels.push('".$data_suhu['waktu']."');";
            echo "suhuData.push(".$data_suhu['suhu'].");";
        }
    ?>

    const data = {
        labels: labels,
        datasets: [{
            label: 'Grafik Suhu 24 Jam',
            data: suhuData,
            fill: false,
            borderColor: '#F7C35F',
            tension: 0.1
        }]
    };

    const config = {
        type: 'line',
        data: data,
    };

    const myChart = new Chart(ctx, config);
</script>


@endsection
