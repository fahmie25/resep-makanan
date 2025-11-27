<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rasa Nusantara</title>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Nunito&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            background-color: #F8F1E3;
        }

        /* ========== HEADER ========== */

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
            width: 70px;
        }

        .brand-text {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: #B3261E;
        }

        .title {
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            color: #B3261E;
            text-align: center;
            line-height: 1.2;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 20px;
            font-size: 18px;
        }

        /* Link Favorite dan Upload */
        .nav-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            color: black;
            cursor: pointer;
            font-weight: 600;
        }

        /* Tombol Login */
        .btn-login {
            padding: 10px 22px;
            border-radius: 4px;
            border: 1px solid #000;
            background-color: #E5B352;
            font-weight: 600;
            text-decoration: none;
            color: black;
            cursor: pointer;
        }

        /* SEARCH */
        .search-wrapper {
            width: 65%;
            margin: 10px auto 20px auto;
        }

        .search-box {
            width: 100%;
            display: flex;
            align-items: center;
            padding: 10px 18px;
            border-radius: 999px;
            border: 2px solid #B3261E;
            background-color: #EDE6DD;
            font-size: 18px;
        }

        .search-input {
            border: none;
            outline: none;
            width: 100%;
            background: transparent;
            font-size: 18px;
        }

        .divider {
            border-top: 3px solid #000;
            margin: 8px 0 0 0;
        }

        /* RESEP POPULER */
        .section-title {
            font-family: 'Playfair Display', serif;
            text-align: center;
            font-size: 34px;
            margin-top: 25px;
            color: #B3261E;
        }

        .recipes {
            display: flex;
            justify-content: center;
            gap: 26px;
            padding: 25px 40px 40px;
            flex-wrap: wrap;
        }

        .card {
            width: 190px;
            background-color: #EBCFD0;
            border-radius: 24px;
            padding: 12px;
            text-align: center;
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 15px;
        }

        .card-title {
            font-family: 'Playfair Display', serif;
            margin-top: 10px;
            font-size: 20px;
        }

    </style>
</head>
<body>

<header>
    <div class="logo">
        <img src="{{ asset('storage/images/logo.jpg') }}" alt="Logo">
        <div class="brand-text">Rasa Nusantara</div>
    </div>

    <div class="title">
        Sajian Makanan<br>
        Cita Rasa Nusantara
    </div>

    <div class="actions">

        {{-- ⭐ Favorite (ikon + teks bisa diklik) --}}
        <a href="{{ route('favorites.index') }}" class="nav-link">
            ⭐ <span>Favorite</span>
        </a>

        {{-- ⬆ Upload (nanti bisa diganti route upload) --}}
        <a href="#" class="nav-link">
            ⬆ <span>Upload</span>
        </a>

         @guest
            {{-- Jika belum login --}}
            <a href="{{ route('login') }}" class="btn-login">Login ⇗</a>
        @endguest

        @auth
            {{-- Jika sudah login --}}
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn-login" 
                    style="background:#B3261E; color:white; border:1px solid #000; cursor:pointer;">
                    Logout ⇘
                </button>
            </form>
        @endauth
    </div>
</header>

<div class="search-wrapper">
    <div class="search-box">
        <span>🔍</span>
        <input class="search-input" type="text" placeholder="Cari Resep Disini">
    </div>
    <div class="divider"></div>
</div>

<h2 class="section-title">Resep Populer</h2>

<div class="recipes">

    <a href="{{ route('resep.rendang') }}" style="text-decoration:none; color:inherit;">
        <div class="card">
            <img src="{{ asset('storage/images/rendang.jpg') }}" alt="Rendang Padang">
            <div class="card-title">Rendang<br>Padang</div>
        </div>
    </a>

    <a href="{{ route('resep.gudeg') }}" style="text-decoration:none; color:inherit;">
        <div class="card">
            <img src="{{ asset('storage/images/gudeg.jpg') }}" alt="Gudeg Jogja">
            <div class="card-title">Gudeg<br>Jogja</div>
        </div>
    </a>

    <a href="{{ route('resep.sate') }}" style="text-decoration:none; color:inherit;">
        <div class="card">
            <img src="{{ asset('storage/images/sate madura.jpg') }}" alt="Sate Madura">
            <div class="card-title">Sate<br>Madura</div>
        </div>
    </a>

    <a href="{{ route('kerak-telor') }}" style="text-decoration:none; color:inherit;">
        <div class="card">
            <img src="{{ asset('storage/images/kerak telor.jpg') }}" alt="Kerak Telor Jakarta">
            <div class="card-title">Kerak Telor<br>Jakarta</div>
        </div>
    </a>

</div>

</body>
</html>
