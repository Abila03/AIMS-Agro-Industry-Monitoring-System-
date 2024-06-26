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
                <input type="text" class="form-control mt-3 p-2" placeholder="Masukkan parameter atas" name="max_suhu" id="max_suhu">
                <input type="text" class="form-control mt-3 p-2" placeholder="Masukkan parameter bawah" name="min_suhu" id="min_suhu">
                <div class="row">
                    <div class="col-md-8 mt-3">
                        <div class="card p-2">
                            <h6 style="margin-top: -6px">Parameter</h6>
                            <h6 id="parameter" style="margin-top: -10px; margin-bottom: -4px"> </h6>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button id="btn-perbarui" class="btn btn-warning float-end mt-3 p-2" style="width: 7rem">Perbarui</button>
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

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function(){
    $('#notifbtn').on('click', function (e) {
        e.stopPropagation();
        <?php
            $conn = mysqli_connect("127.0.0.1", "root" , "", "aims");
            $parameter = mysqli_query($conn, "SELECT min_suhu, max_suhu FROM parameter_suhu");
            $parameterData = [];
            while ($data_parameter = mysqli_fetch_assoc($parameter)) {
                $parameterData[] = $data_parameter;
            }
            $suhunotif = mysqli_query($conn, "SELECT suhu FROM suhu ORDER BY id_suhu DESC LIMIT 1");
            $suhuData = mysqli_fetch_assoc($suhunotif);
            mysqli_close($conn);
        ?>
        var max = <?php echo $parameterData[0]['max_suhu']; ?>;
        var min = <?php echo $parameterData[0]['min_suhu']; ?>;
        var suhu = <?php echo $suhuData['suhu']; ?>;
        if (suhu > max) {
                $('#notif-content').html("Suhu saat ini: " + suhu + ". Suhu di atas parameter, segera tambahkan air dingin dan dinginkan instalasi");
            } else if (suhu < min) {
                $('#notif-content').html("Suhu saat ini: " + suhu + ". Suhu di bawah parameter, segera tambahkan air hangat dan hangatkan instalasi");
            } else {
                $('#notif-content').html("Suhu saat ini: " + suhu + ". Suhu Normal");
            }
        $(this).next('.dropdown').find('[data-bs-toggle=dropdown]').dropdown('toggle');
    });
} );
</script>

<script>
    var parameterElement = document.getElementById('parameter');
    <?php
        $conn = mysqli_connect("127.0.0.1", "root" , "", "aims"); 
        $parameter = mysqli_query($conn, "SELECT min_suhu, max_suhu FROM parameter_suhu");
        $max = array();
        $min = array();
        while ($data_parameter = mysqli_fetch_array($parameter)) {
            $min[] = $data_parameter['min_suhu'];
            $max[] = $data_parameter['max_suhu'];
        }
    ?>
    var minTemperature = <?php echo json_encode($min); ?>[0];
    var maxTemperature = <?php echo json_encode($max); ?>[0];
    var temperatureRange = minTemperature + '&nbsp;<sup>o</sup>C -&nbsp;' + maxTemperature + '&nbsp;<sup>o</sup>C';

    parameterElement.innerHTML = temperatureRange;
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var maxSuhuInput = document.getElementById('max_suhu');
    var minSuhuInput = document.getElementById('min_suhu');
    var perbaruiButton = document.getElementById('btn-perbarui');

    function checkInputs() {
        var maxSuhuValue = maxSuhuInput.value.trim();
        var minSuhuValue = minSuhuInput.value.trim();

        if (maxSuhuValue !== '' || minSuhuValue !== '') {
            perbaruiButton.disabled = false;
        } else {
            perbaruiButton.disabled = true;
        }
    }
    perbaruiButton.disabled = true;
    setInterval(checkInputs, 1000);
    maxSuhuInput.addEventListener('input', checkInputs);
    minSuhuInput.addEventListener('input', checkInputs);



});
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

    var target = document.getElementById('suhu-terkini');
    var gauge = new Gauge(target).setOptions(opts);
    gauge.maxValue = 100;
    gauge.setMinValue(0);
    gauge.animationSpeed = 32;

    
    var suhu = <?php echo $latestSuhu->suhu; ?>;
    gauge.set(suhu);

    function updateGauge(suhu) {
        gauge.set(suhu); 
    }


    function fetchLatestSuhu() {
        $.ajax({
            url: '/suhu',
            method: 'GET',
            success: function(response) {
                var suhu = response.suhu; 
                updateGauge(suhu); 
            },
            error: function(xhr, status, error) {
                console.error('Error fetching latest suhu:', error);
            }
        });
    }

    // setInterval(fetchLatestSuhu, 5000);
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function updateSuhuDisplay(suhu) {
        $('#suhu').text(suhu + ' °C'); 
    }
    updateSuhuDisplay(<?php echo $latestSuhu->suhu; ?>);

    function fetchLatestSuhu() {
        $.ajax({
            url: '/suhu', 
            method: 'GET',
            success: function(response) {
                var suhu = response.suhu;
                updateSuhuDisplay(suhu);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching latest suhu:', error);
            }
        });
    }

    // setInterval(fetchLatestSuhu, 5000);
</script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('grafik-suhu');
    var labels = [];
    var suhuData = [];
    <?php
        $conn = mysqli_connect("127.0.0.1", "root" , "", "aims"); 
        $suhu = mysqli_query($conn, "SELECT waktu, suhu FROM suhu WHERE waktu >= NOW() - INTERVAL 1 DAY ORDER BY waktu ASC");
        while ($data_suhu = mysqli_fetch_array($suhu)) {
            echo "labels.push('".$data_suhu['waktu']."');";
            echo "suhuData.push(".$data_suhu['suhu'].");";
        }
    ?>

    var data = {
        labels: labels,
        datasets: [{
            label: 'Grafik Suhu 24 Jam',
            data: suhuData,
            fill: false,
            borderColor: '#F7C35F',
            tension: 0.1
        }]
    };

    var config = {
        type: 'line',
        data: data,
    };

    var myChart = new Chart(ctx, config);
</script>


@endsection
