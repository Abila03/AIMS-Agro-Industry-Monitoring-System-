<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-green">
    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row justify-content-center">
            <div class="col-md-4 text-center text-white">
                <form action="{{ route('login.submit') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="text" placeholder="Username" class="mb-3 input form-control bg-input text-white @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">

                    </div>
                    <div class="mb-3">
                        <input type="password" placeholder="Password" class="mb-3 input form-control bg-input text-white @error('password') is-invalid @enderror" name="password">
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-warning mt-4">Masuk</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
