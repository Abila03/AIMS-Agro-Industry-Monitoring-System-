@extends('layouts.app')

@section('title', 'Page Ph Air')

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
            <a href="riwayat-ph" class="nav-link">
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
            <h2>Parameter Ph air</h2>
            <form action="" method="post">
                @csrf
                <input type="text" class="form-control mt-3 p-2" placeholder="Masukkan parameter atas" name="max_ph_air" id="">
                <input type="text" class="form-control mt-3 p-2" placeholder="Masukkan parameter bawah" name="min_ph_air" id="">
                <div class="row">
                    <div class="col-md-8 mt-3">
                        <div class="card p-2">
                            <h6 style="margin-top: -6px">Parameter</h6>
                            <h6 id="parameter" style="margin-top: -10px; margin-bottom: -4px"> </h6>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-warning float-end mt-3 p-2" style="width: 7rem">Update</button>
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
                    <canvas id="ph-terkini"></canvas>
                    <h1 id="ph"></h1>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-1">
                <div class="card-body">
                    <canvas id="grafik-ph"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var parameterElement = document.getElementById('parameter');
    <?php
        $conn = mysqli_connect("127.0.0.1", "root" , "", "aims"); 
        $parameter = mysqli_query($conn, "SELECT min_ph_air, max_ph_air FROM parameter_ph_air");
        $max = array();
        $min = array();
        while ($data_parameter = mysqli_fetch_array($parameter)) {
            $min[] = $data_parameter['min_ph_air'];
            $max[] = $data_parameter['max_ph_air'];
        }
    ?>
    var minTemperature = <?php echo json_encode($min); ?>[0];
    var maxTemperature = <?php echo json_encode($max); ?>[0];
    var temperatureRange = minTemperature + '&nbsp;<sup>o</sup>C -&nbsp;' + maxTemperature + '&nbsp;<sup>o</sup>C';

    parameterElement.innerHTML = temperatureRange;
</script>

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

    var target = document.getElementById('ph-terkini');
    var gauge = new Gauge(target).setOptions(opts);
    gauge.maxValue = 100;
    gauge.setMinValue(0);
    gauge.animationSpeed = 32;

    
    var ph = <?php echo $latestPh->ph_air; ?>;
    gauge.set(ph);

    function updateGauge(ph) {
        gauge.set(ph); 
    }


    function fetchLatestPh() {
        $.ajax({
            url: '/ph',
            method: 'GET',
            success: function(response) {
                const ph = response.ph; 
                updateGauge(ph); 
            },
            error: function(xhr, status, error) {
                console.error('Error fetching latest ph:', error);
            }
        });
    }

    // setInterval(fetchLatestPh, 5000);
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function updatePhDisplay(ph) {
        $('#ph').text(ph + ' °C'); 
    }
    updatePhDisplay(<?php echo $latestPh->ph_air; ?>);

    function fetchLatestPh() {
        $.ajax({
            url: '/ph', 
            method: 'GET',
            success: function(response) {
                const ph = response.ph;
                updatePhDisplay(ph);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching latest ph:', error);
            }
        });
    }

    // setInterval(fetchLatestph_air, 5000);
</script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafik-ph');
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
            label: 'Grafik Ph 24 Jam',
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
