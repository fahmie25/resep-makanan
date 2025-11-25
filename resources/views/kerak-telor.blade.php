<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kerak Telor Jakarta</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Nunito&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background-color: #F8F1E3;
        }

        .page {
            min-height: 100vh;
            padding: 30px 40px;
        }

        .top-bar {
            display: flex;
            justify-content: flex-end;
        }

        .back-btn {
            text-decoration: none;
            font-size: 22px;
            color: #B3261E;
        }

        .title {
            font-family: 'Playfair Display', serif;
            font-size: 64px;
            color: #B3261E;
            margin: 0;
        }

        .subtitle {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #B3261E;
            margin-left: 15px;
        }

        .header {
            display: flex;
            align-items: baseline;
            gap: 10px;
            margin-bottom: 20px;
        }

        .content {
            display: grid;
            grid-template-columns: 1.1fr 2fr;
            gap: 30px;
        }

        .photo-box img {
            width: 100%;
            border-radius: 20px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .ingredients, .steps {
            font-size: 15px;
            line-height: 1.5;
        }

        ul {
            padding-left: 18px;
            margin-top: 0;
        }

        ol {
            padding-left: 20px;
            margin-top: 0;
        }
    </style>
</head>
<body>

<div class="page">
    <div class="top-bar">
        <a href="{{ route('home') }}" class="back-btn">←</a>
    </div>

    <div class="header">
        <h1 class="title">Kerak Telor</h1>
        <div class="subtitle">Jakarta</div>
    </div>

    <div class="content">
        {{-- KIRI: foto + bahan --}}
        <div>
            <div class="photo-box">
                <img src="{{ asset('storage/images/kerak telor.jpg') }}" alt="Kerak Telor">
            </div>

            <h3 class="section-title">Bahan Bahan :</h3>
            <div class="ingredients">
                <ul>
                    <li>100 gram beras ketan putih, rendam ±2 jam lalu tiriskan</li>
                    <li>3 butir telur bebek (bisa diganti telur ayam, tapi rasa lebih gurih pakai telur bebek)</li>
                    <li>2 sdm ebi (udang kering), rendam air panas lalu haluskan</li>
                    <li>4 sdm kelapa parut sangrai (serundeng)</li>
                    <li>1 batang daun bawang, iris halus</li>
                    <li>½ sdt merica bubuk</li>
                    <li>½ sdt garam</li>
                    <li>½ sdt gula pasir</li>
                    <li>3 butir bawang merah</li>
                    <li>2 siung bawang putih</li>
                    <li>1 cm kencur</li>
                    <li>½ sdt ketumbar bubuk</li>
                    <li>1 sdt cabai bubuk (opsional kalau mau agak pedas)</li>
                </ul>
            </div>
        </div>

        {{-- KANAN: cara pembuatan --}}
        <div>
            <h3 class="section-title">Cara Pembuatan :</h3>
            <div class="steps">
                <ol>
                    <li><b>Masak ketan:</b>
                        <ul>
                            <li>Kukus beras ketan hingga matang (±20–25 menit), sisihkan.</li>
                        </ul>
                    </li>

                    <li><b>Campurkan bahan:</b>
                        <ul>
                            <li>Dalam mangkuk, kocok lepas telur.</li>
                            <li>Tambahkan ebi halus, kelapa sangrai, bumbu halus, daun bawang, garam, dan gula.</li>
                            <li>Aduk rata.</li>
                        </ul>
                    </li>

                    <li><b>Masak kerak telor:</b>
                        <ul>
                            <li>Panaskan wajan kecil (lebih bagus wajan tanah liat).</li>
                            <li>Tuang 2 sdm ketan matang, ratakan tipis di dasar wajan.</li>
                            <li>Tuang campuran telur di atasnya, ratakan perlahan.</li>
                            <li>Masak dengan api kecil hingga bagian bawahnya kering dan agak gosong.</li>
                            <li>Balik wajannya menghadap ke arah api (kalau pakai arang) atau tutup agar bagian atas matang.</li>
                        </ul>
                    </li>

                    <li><b>Sajikan:</b>
                        <ul>
                            <li>Setelah matang dan kering, angkat kerak telor.</li>
                            <li>Taburi kelapa sangrai dan ebi di atasnya sebagai topping tambahan.</li>
                        </ul>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

</body>
</html>