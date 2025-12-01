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

        .logo img {
            width: 60px;
        }

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
        {{-- HOME --}}
        <a href="{{ route('home') }}" class="nav-link">
            <svg width="18" height="18" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9.5L9 3l6 6.5M4 8.5V15h4v-3h2v3h4V8.5" />
            </svg>
            Home
        </a>

        {{-- TOMBOL GRAFIK FAVORITE / KEMBALI --}}
        @if(request()->is('admin*'))
            @if(request()->is('admin/favorite-stats'))
                {{-- KEMBALI --}}
                <a href="{{ route('admin.resep.index') }}" class="nav-link">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                         stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6" />
                        <line x1="9" y1="12" x2="21" y2="12" />
                    </svg>
                    Kembali
                </a>
            @else
                {{-- GRAFIK FAVORITE --}}
                <a href="{{ route('admin.favorite.stats') }}" class="nav-link">
                    <svg width="18" height="18" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="4 14 10 8 14 12 20 4" />
                    </svg>
                    Grafik Favorite
                </a>
            @endif
        @endif

        {{-- FAVORITE --}}
        <a href="{{ route('favorites.index') }}" class="nav-link">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="#B3261E"
                 stroke="#B3261E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 2.5l2.9 5.9 6.6.9-4.8 4.7 1.1 6.6L12 17.8l-5.8 3.1 1.1-6.6-4.8-4.7 6.6-.9L12 2.5z"/>
            </svg>
            Favorite
        </a>

        @guest
            <a href="{{ route('login') }}" class="btn-login">Login ⇗</a>
        @endguest

        @auth
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn-login" style="background:#B3261E; color:white;">
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
