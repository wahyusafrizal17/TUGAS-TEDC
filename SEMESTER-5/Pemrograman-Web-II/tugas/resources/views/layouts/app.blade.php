<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Laravel App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Wayyy Stack</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('karyawan.index') }}">Karyawan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('projek.index') }}">Projek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('assignprojek.index') }}">Assign Projek</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="p-4 mt-3">
        @yield('content')
    </div>

</head>
<body>
