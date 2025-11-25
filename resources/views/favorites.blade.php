<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Resep Favorit - Rasa Nusantara</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Nunito&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
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
            width: 70px;
        }

        .brand-text {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: #B3261E;
        }

        .title-page {
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            color: #B3261E;
            text-align: center;
            flex: 1;
        }

        .back-link {
            text-decoration: none;
            font-size: 18px;
            color: black;
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

        .empty {
            text-align: center;
            margin-top: 40px;
            font-size: 18px;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">
        <img src="{{ asset('storage/images/logo.jpg') }}" alt="Logo">
        <div class="brand-text">Rasa Nusantara</div>
    </div>

    <div class="title-page">
        Resep Favorit Saya
    </div>

    <a href="{{ route('home') }}" class="back-link">← Kembali</a>
</header>

    @if(isset($favorites) && $favorites->isEmpty())
        <div class="empty">
            Anda belum menambahkan resep favorit.
        </div>
    @endif
</body>
</html>