@extends('layouts.app')
@section('title')
    Page Suhu
@endsection
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
                    <input type="text" class="form-control mt-3 p-2" placeholder="Masukkan parameter atas" name=""
                        id="">
                    <input type="text" class="form-control mt-3 p-2" placeholder="Masukkan parameter bawah"
                        name="" id="">
                    <div class="row">
                        <div class="col-md-8 mt-3">
                            <div class="card p-2">
                                <h6 style="margin-top: -6px">Parameter</h6>
                                <h6 style="margin-top: -10px; margin-bottom: -4px">25.5 <sup>o</sup>C - 30 <sup>o</sup>C
                                </h6>
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
                        <h1>24 <sup>o</sup>C</h1>
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
    <script src="https://bernii.github.io/gauge.js/dist/gauge.min.js"></script>
    <script>
        var opts = {
            angle: -0.2, // The span of the gauge arc
            lineWidth: 0.2, // The line thickness
            radiusScale: 1, // Relative radius
            pointer: {
                length: 0.6, // // Relative to gauge radius
                strokeWidth: 0.024, // The thickness
                color: '#000000' // Fill color
            },
            limitMax: false, // If false, max value increases automatically if value > maxValue
            limitMin: false, // If true, the min value of the gauge will be fixed
            colorStart: '#6F6EA0', // Colors
            colorStop: '#C0C0DB', // just experiment with them
            strokeColor: '#EEEEEE', // to see which ones work best for you
            generateGradient: true,
            highDpiSupport: true, // High resolution support

        };
        var target = document.getElementById('suhu-terkini'); // your canvas element
        var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
        gauge.maxValue = 3000; // set max gauge value
        gauge.setMinValue(0); // Prefer setter over gauge.minValue = 0
        gauge.animationSpeed = 32; // set animation speed (32 is default value)
        gauge.set(1700); // set actual value
    </script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafik-suhu');
    const labels = [];
    const phData = [];
    <?php
        $conn = mysqli_connect("127.0.0.1", "root" , "", "aims"); 
        $ph = mysqli_query($conn, "SELECT waktu, ph_air FROM ph_air WHERE waktu >= NOW() - INTERVAL 1 DAY ORDER BY waktu ASC");
        while ($data_ph = mysqli_fetch_array($ph)) {
            echo "labels.push('".$data_ph['waktu']."');";
            echo "phData.push(".$data_ph['ph_air'].");";
        }
    ?>

    const data = {
        labels: labels,
        datasets: [{
            label: 'Grafik pH Air 24 Jam',
            data: phData,
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