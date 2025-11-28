<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Rasa Nusantara')</title>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Nunito&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background-color: #F8F1E3;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo img { width: 60px; }

        .brand-text {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: #B3261E;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 20px;
            font-size: 16px;
        }

        .nav-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            color: black;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-login {
            padding: 8px 18px;
            border-radius: 4px;
            border: 1px solid #000;
            background-color: #E5B352;
            font-weight: 600;
            text-decoration: none;
            color: black;
            cursor: pointer;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">
        <img src="{{ asset('storage/images/logo.jpg') }}" alt="Logo">
        <div class="brand-text">Rasa Nusantara</div>
    </div>

    <div class="actions">
        <a href="{{ route('home') }}" class="nav-link">🏠 Home</a>
        <a href="{{ route('favorites.index') }}" class="nav-link">⭐ Favorite</a>

        @guest
            <a href="{{ route('login') }}" class="btn-login">Login ⇗</a>
        @endguest

        @auth
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn-login"
                    style="background:#B3261E; color:white;">
                    Logout ⇘
                </button>
            </form>
        @endauth
    </div>
</header>

{{-- Isi halaman spesifik --}}
@yield('content')

</body>
</html>