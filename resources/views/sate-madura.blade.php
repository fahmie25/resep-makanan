<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sate Madura</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Nunito&display=swap" rel="stylesheet">

    <style>
        body { background:#F8F1E3; margin:0; font-family:'Nunito',sans-serif; }
        .page { padding:40px; }
        .back { float:right; font-size:26px; text-decoration:none; color:#B3261E; }
        .title-main { font-family:'Playfair Display',serif; font-size:72px; color:#B3261E; margin:0; }
        .title-sub { font-family:'Playfair Display',serif; font-size:40px; color:#B3261E; margin-left:10px; }
        .title-row { display:flex; align-items:baseline; gap:4px; margin-bottom:10px; }
        .layout { display:grid; grid-template-columns:1.1fr 1.9fr; gap:30px; margin-top:10px; }
        .photo img { width:100%; border-radius:18px; }
        h2 { font-family:'Playfair Display',serif; font-size:26px; color:#B3261E; margin-bottom:10px; }
        ul, ol { font-size:15px; line-height:1.6; margin-top:0; }
    </style>
</head>
<body>

<div class="page">
    <a href="{{ route('home') }}" class="back">←</a>

    <div class="title-row">
        <h1 class="title-main">Sate</h1>
        <div class="title-sub">Madura</div>
    </div>

    <div class="layout">
        <div>
            <div class="photo">
                <img src="{{ asset('storage/images/sate madura.jpg') }}" alt="Sate Madura">
            </div>

            <h2>Bahan-bahan :</h2>
            <ul>
                <li>500 gram daging ayam / kambing, potong dadu</li>
                <li>10–15 tusuk sate (bambu)</li>
                <li>3 siung bawang putih, haluskan</li>
                <li>2 sdm kecap manis</li>
                <li>1 sdm air jeruk nipis</li>
                <li>Garam dan merica secukupnya</li>
                <li>200 gram kacang tanah, goreng lalu haluskan</li>
                <li>3 siung bawang merah</li>
                <li>3 siung bawang putih</li>
                <li>5 buah cabai merah keriting</li>
                <li>250 ml air</li>
                <li>2 sdm gula merah, 1 sdt garam</li>
            </ul>
        </div>

        <div>
            <h2>Cara Pembuatan :</h2>
            <ol>
                <li><b>Memarinasi daging</b>
                    <ul>
                        <li>Campur daging dengan bawang putih halus, kecap, jeruk nipis, garam, merica.</li>
                        <li>Diamkan minimal 30 menit.</li>
                        <li>Tusuk daging ke tusuk sate.</li>
                    </ul>
                </li>
                <li><b>Membuat bumbu kacang</b>
                    <ul>
                        <li>Haluskan bawang merah, bawang putih, dan cabai.</li>
                        <li>Tumis sebentar, lalu masukkan kacang tanah halus, air, gula merah, garam.</li>
                        <li>Masak sampai mengental.</li>
                    </ul>
                </li>
                <li><b>Membakar sate</b>
                    <ul>
                        <li>Bakar sate di atas bara sambil dioles bumbu kacang + kecap.</li>
                        <li>Balik-balik sampai matang dan sedikit kecokelatan.</li>
                    </ul>
                </li>
                <li><b>Penyajian</b>
                    <ul>
                        <li>Sajikan sate di piring dengan lontong / nasi, siram bumbu kacang.</li>
                        <li>Tambahkan irisan bawang merah, cabai, dan jeruk limau.</li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>
</div>

</body>
</html>