<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Gudeg Jogja</title>

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
        <h1 class="title-main">Gudeg</h1>
        <div class="title-sub">Jogja</div>
    </div>

    <div class="layout">
        <div>
            <div class="photo">
                <img src="{{ asset('storage/images/gudeg.jpg') }}" alt="Gudeg Jogja">
            </div>

            <h2>Bahan-bahan :</h2>
            <ul>
                <li>1 kg nangka muda, potong kecil-kecil</li>
                <li>1 liter santan sedang</li>
                <li>5 butir telur rebus (opsional)</li>
                <li>3 lembar daun salam</li>
                <li>2 ruas lengkuas, memarkan</li>
                <li>100 gram gula merah, sisir</li>
                <li>Garam secukupnya</li>
                <li>8 butir bawang merah</li>
                <li>5 siung bawang putih</li>
                <li>1 sdm ketumbar, sangrai</li>
                <li>3 butir kemiri</li>
            </ul>
        </div>

        <div>
            <h2>Cara Pembuatan :</h2>
            <ol>
                <li><b>Merebus nangka</b>
                    <ul>
                        <li>Rebus nangka muda dengan air sampai agak empuk, tiriskan.</li>
                    </ul>
                </li>
                <li><b>Membuat bumbu halus</b>
                    <ul>
                        <li>Haluskan bawang merah, bawang putih, kemiri, dan ketumbar.</li>
                    </ul>
                </li>
                <li><b>Memasak gudeg</b>
                    <ul>
                        <li>Susun daun salam dan lengkuas di dasar panci, masukkan nangka di atasnya.</li>
                        <li>Tuang santan dan bumbu halus, tambahkan gula merah dan garam.</li>
                        <li>Masak dengan api kecil sampai santan menyusut dan warna kecokelatan.</li>
                    </ul>
                </li>
                <li><b>Penyajian</b>
                    <ul>
                        <li>Sajikan gudeg dengan telur rebus, sambal goreng krecek, dan nasi hangat.</li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>
</div>

</body>
</html>