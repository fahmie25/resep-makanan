<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rasa Nusantara</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Nunito&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            background: #F8F1E3;
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
        }
        .logo img {
            width: 70px;
            margin-right: 10px;
        }
        .title {
            font-family: 'Merriweather', serif;
            font-size: 28px;
            text-align: center;
        }
        .actions {
            display: flex;
            gap: 20px;
            font-size: 18px;
        }
        .search-box {
            margin: 20px auto;
            width: 60%;
            background: #e8e8e8;
            padding: 12px 20px;
            border-radius: 30px;
            display: flex;
            align-items: center;
        }
        .search-box input {
            border: none;
            outline: none;
            width: 100%;
            background: transparent;
            font-size: 18px;
        }
        .section-title {
            font-family: 'Merriweather', serif;
            text-align: center;
            font-size: 36px;
            margin-top: 30px;
        }
        .recipes {
            display: flex;
            justify-content: center;
            gap: 30px;
            padding: 30px;
        }
        .card {
            width: 200px;
            background: #fdfdfd;
            border-radius: 20px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .card img {
            width: 100%;
            border-radius: 15px;
        }
        .card-title {
            font-family: 'Merriweather', serif;
            margin-top: 10px;
            font-size: 20px;
        }
    </style>
</head>
<body>

<header>
  <div class="logo">
    <img src="{{ asset('storage/images/logo.jpg') }}" alt="Logo">
    <!-- <div>Rasa Nusantara</div> -->
</div>


    <div class="title">
        Sajian Makanan Cita Rasa Nusantara
    </div>

    <div class="actions">
        <div>⭐ Favorite</div>
        <div>⬆ Upload</div>
        <button style="padding:10px 20px; border-radius:10px;">Login</button>
    </div>
</header>

<div class="search-box">
    🔍 &nbsp;<input type="text" placeholder="Cari Resep Disini">
</div>

<hr>

<h2 class="section-title">Resep Populer</h2>

<div class="recipes">

    <div class="card">
        <img src="/images/rendang.jpg">
        <div class="card-title">Rendang<br>Padang</div>
    </div>

    <div class="card">
        <img src="/images/gudeg.jpg">
        <div class="card-title">Gudeg<br>Jogja</div>
    </div>

    <div class="card">
        <img src="/images/sate.jpg">
        <div class="card-title">Sate<br>Madura</div>
    </div>

    <div class="card">
        <img src="/images/kerak.jpg">
        <div class="card-title">Kerak Telor<br>Jakarta</div>
    </div>

</div>

</body>
</html>
