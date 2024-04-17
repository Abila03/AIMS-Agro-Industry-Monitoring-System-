<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-green">
    <div class="container-fluid d-flex align-items-center justify-content-center vh-100">
        <div class="image-container text-center">
            <img src="{{ asset('images/home.png') }}" class="img-fluid mb-4" alt="Deskripsi Gambar">
            <p class="image-text">Selamat Datang, Mitra</p>
            <p class="image-text-1">Dissuade ecstatic and properly saw entirely sir why laughter endeavor. In on my
                jointure
                horrible margaret suitable he
                speedily.</p>
            <div class="button-container">
                <a href="/login" class="btn btn-warning btn-register p-2" style="width: 7rem">Login</a>
                <a href="{{ url('register') }}" class="btn btn-warning btn-register p-2" style="width: 7rem">Register</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>