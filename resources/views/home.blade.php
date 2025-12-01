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
            padding: 10px 22px;
            border-radius: 4px;
            border: 1px solid #000;
            background-color: #E5B352;
            font-weight: 600;
            text-decoration: none;
            color: black;
            cursor: pointer;
        }

        /* ========== SEARCH ========== */

        .search-container {
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 850px;
            margin: 24px auto;
            background: #EFE8DF;
            border: 2px solid #B3261E;
            padding: 10px 16px;
            border-radius: 999px;
            position: relative;
        }

        .search-container input {
            flex: 1;
            border: none;
            background: transparent;
            font-size: 16px;
            outline: none;
            font-family: 'Nunito', sans-serif;
        }

        .search-btn {
            background: #B3261E;
            border: none;
            border-radius: 999px;
            padding: 10px 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.2s;
        }

        .search-btn:hover {
            background: #8d1e18;
        }

        .search-btn svg {
            display: block;
        }

        /* ========== RESEP POPULER ========== */

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
            position: relative;
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

        .search-line {
            margin-top: 6px;
            width: 100%;
            height: 3px;
            background-color: #B3261E;
        }

        /* Tombol favorit posisi pojok */
        .fav-btn {
            position: absolute;
            top: 10px;
            right: 12px;
            font-size: 26px;
            background: none;
            border: none;
            cursor: pointer;
        }

        /* ==== CARD RESEP — ANIMASI HOVER SIMPLE ELEGAN ==== */

        .card {
            width: 200px;
            background-color: #EBCFD0;
            border-radius: 24px;
            padding: 12px;
            text-align: center;
            position: relative;
            cursor: pointer;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .card:hover {
            transform: translateY(-12px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.18);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 15px;
            transition: opacity 0.25s ease;
        }

        .card:hover img {
            opacity: 0.92;
        }

        .card-title {
            font-family: 'Playfair Display', serif;
            margin-top: 10px;
            font-size: 20px;
            transition: color 0.2s ease;
        }

        .card:hover .card-title {
            color: #8d1e18;
        }

        .recipes .card {
            opacity: 0;
            animation: fadeUp 0.6s ease forwards;
        }

        .recipes .card:nth-child(1) { animation-delay: 0.1s; }
        .recipes .card:nth-child(2) { animation-delay: 0.2s; }
        .recipes .card:nth-child(3) { animation-delay: 0.3s; }
        .recipes .card:nth-child(4) { animation-delay: 0.4s; }
        .recipes .card:nth-child(5) { animation-delay: 0.5s; }
        .recipes .card:nth-child(6) { animation-delay: 0.6s; }

        @keyframes fadeUp {
            0%   { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
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
        {{-- Favorite --}}
        <a href="{{ route('favorites.index') }}" class="nav-link">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="#B3261E"
                 stroke="#B3261E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 2.5l2.9 5.9 6.6.9-4.8 4.7 1.1 6.6L12 17.8l-5.8 3.1 1.1-6.6-4.8-4.7 6.6-.9L12 2.5z"/>
            </svg>
            <span>Favorite</span>
        </a>

        {{-- Upload (user login) --}}
        @auth
            <a href="{{ route('upload.resep') }}" class="nav-link">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                     stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 19V5" />
                    <polyline points="5 12 12 5 19 12" />
                </svg>
                <span>Upload</span>
            </a>
        @endauth

        {{-- Upload (belum login -> diarahkan ke login) --}}
        @guest
            <a href="{{ route('login') }}" class="nav-link">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                     stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 19V5" />
                    <polyline points="5 12 12 5 19 12" />
                </svg>
                <span>Upload</span>
            </a>
        @endguest

        @guest
            <a href="{{ route('login') }}" class="btn-login">Login ⇗</a>
        @endguest

        @auth
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit"
                        class="btn-login"
                        style="background:#B3261E; color:white; border:1px solid #000;">
                    Logout ⇘
                </button>
            </form>
        @endauth
    </div>
</header>

{{-- FORM SEARCH --}}
<div class="search-wrapper" style="width:100%; margin:0 auto;">
    <form action="{{ route('home') }}" method="GET">
        <div class="search-container">
            <input
                type="text"
                name="q"
                placeholder="Cari Resep Disini"
                value="{{ $search ?? '' }}"
            >
            <button type="submit" class="search-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>
        </div>
    </form>

    {{-- garis merah di bawah search --}}
    <div class="search-line"></div>
</div>

<h2 class="section-title">
    @if(!empty($search))
        Hasil untuk "{{ $search }}"
    @else
        Resep Populer
    @endif
</h2>

<div class="recipes">
    {{-- LOOP DINAMIS DARI DATABASE --}}
    @foreach($reseps as $resep)
        <div class="card">
            {{-- Klik gambar menuju detail --}}
            <a href="{{ route('resep.show', $resep->id) }}" style="text-decoration:none; color:inherit;">
                <img src="{{ asset('storage/' . $resep->gambar) }}" alt="{{ $resep->nama }}">
                <div class="card-title">{{ $resep->nama }}</div>
            </a>
        </div>
    @endforeach
</div>

<div class="footer-illustration"
     style="background-image: url('{{ asset('storage/images/fotobanyakan.jpg') }}');">
</div>

</body>
</html>
