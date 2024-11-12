<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Brico BLOG')</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Assure-toi que ton CSS est chargé ici -->

    <style>
        /* Styles personnalisés */
        body {
            background-color: #f8f9fa; /* Couleur de fond */
        }
        .header-title {
            color: orange; /* Couleur orange pour le titre */
        }
        .header-subtitle {
            color: blue; /* Couleur bleue pour la partie 'BLOG' */
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="d-flex justify-content-between align-items-center p-3 bg-white shadow">
        <div class="header-title font-weight-bold display-4">
            <span class="header-title">Brico</span>
            <span class="header-subtitle">BLOG</span>
        </div>

        <div class="d-flex align-items-center">
            @auth
            @if(auth()->user()->profile_image)
            <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="Profile Image" class="rounded-circle" style="width: 50px; height: 50px;">
        @else
            <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile Image" class="rounded-circle" style="width: 50px; height: 50px;">
        @endif

                <a href="{{ url('/profile') }}" class="btn btn-secondary mx-2 transition hover:bg-gray-700">Paramètre</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Déconnexion</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary mx-2 transition hover:bg-blue-600">Connexion</a>
                <a href="{{ route('register') }}" class="btn btn-success">Inscription</a>
            @endauth
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mt-4">
        <div class="row">
            <!-- Contenu de la page -->
            <section class="col-12 mb-4 p-4 bg-white rounded shadow transition transform hover:scale-105">
                @yield('header')
                
                @yield('content')
            </section>
        </div>
    </main>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
