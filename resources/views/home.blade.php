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
                $('#notif-content').html("Suhu Normal");
            }
        $(this).next('.dropdown').find('[data-bs-toggle=dropdown]').dropdown('toggle');
    });
} );
</script>

<script>
    function updateSuhuDisplay(suhu) {
        $('#suhu').text(suhu); 
    }


    function updatePHDisplay(ph) {
        $('#ph').text(ph); 
    }
    updateSuhuDisplay(<?php echo $suhu->suhu; ?>);
    updatePHDisplay(<?php echo $ph->ph; ?>);

    function fetchLatestSuhu() {
        $.ajax({
            url: '/', 
            method: 'GET',
            success: function(response) {
                const suhu = response.suhu; 
                updateSuhuDisplay(suhu); 
            },
            error: function(xhr, status, error) {
                console.error('Error fetching latest suhu:', error);
            }
        });
    }

 
    function fetchLatestPH() {
        $.ajax({
            url: '/', 
            method: 'GET',
            success: function(response) {
                const ph = response.ph;
                updatePHDisplay(ph);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching latest pH:', error); 
            }
        });
    }

    

    // setInterval(fetchLatestSuhu, 5000);
    // setInterval(fetchLatestPH, 5000);
</script>
@endsection

