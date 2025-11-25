<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rendang Padang</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Nunito&display=swap" rel="stylesheet">

    <style>
        body { background:#F8F1E3; margin:0; font-family:'Nunito',sans-serif; }
        .page { padding:40px; }
        h1 { font-family:'Playfair Display',serif; font-size:68px; color:#B3261E; margin:0; display:flex; align-items:center; gap:16px; }
        h2 { font-family:'Playfair Display',serif; font-size:36px; color:#B3261E; }
        .layout { display:grid; grid-template-columns:1fr 1.7fr; gap:30px; margin-top:10px; }
        .photo img { width:100%; border-radius:18px; }
        ul, ol { font-size:16px; line-height:1.6; }
        .back { float:right; font-size:26px; text-decoration:none; color:#B3261E; }

        .favorite-btn {
            border:none;
            background:none;
            cursor:pointer;
            font-size:42px;
            color:#B3261E;
            line-height:1;
            padding:0;
        }
    </style>
</head>
<body>

<div class="page">
    <a href="{{ route('home') }}" class="back">←</a>

    @php
        $resepId = 1; // ID Rendang di tabel reseps
        $isFavorited = auth()->check()
            && auth()->user()->favoriteReseps->contains($resepId);
    @endphp

    @auth
    <form action="{{ route('reseps.favorite', $resepId) }}" 
      method="POST" 
      style="display:inline;">
        @csrf

        <button type="submit" 
            style="border:none; background:none; font-size:48px; cursor:pointer; color:#b30000;">
            {!! $isFavorited ? '★' : '☆' !!}
    </button>
</form>
@endauth
    </h1>

    <div class="layout">
        
        <div class="photo">
            <img src="{{ asset('storage/images/rendang.jpg') }}" alt="">

            <h2>Bahan-bahan :</h2>
            <ul>
                <li>1 kg daging sapi (bagian sandung lamur, gandik, atau paha belakang)</li>
                <li>2 liter santan dari 2 butir kelapa tua</li>
                <li>2 lembar daun salam</li>
                <li>3 batang serai, memarkan</li>
                <li>2 lembar daun jeruk</li>
                <li>2 lembar daun kunyit</li>
                <li>10 butir bawang merah</li>
                <li>6 siung bawang putih</li>
                <li>5 buah cabai merah besar</li>
                <li>10 buah cabai rawit merah</li>
                <li>3 butir kemiri</li>
                <li>2 cm kunyit</li>
                <li>3 cm lengkuas</li>
                <li>3 cm jahe</li>
                <li>2 sdt garam</li>
                <li>1 sdt gula merah</li>
                <li>½ sdt merica bubuk</li>
            </ul>
        </div>

        <div>
            <h2>Cara Pembuatan :</h2>
            <ol>
                <li><b>Menyiapkan daging:</b>
                    <ul>
                        <li>Potong daging ukuran sedang.</li>
                        <li>Jangan terlalu kecil agar tidak hancur.</li>
                    </ul>
                </li>

                <li><b>Membuat bumbu:</b>
                    <ul>
                        <li>Haluskan bawang merah, bawang putih, cabai, jahe, kunyit, kemiri.</li>
                    </ul>
                </li>

                <li><b>Memasak santan:</b>
                    <ul>
                        <li>Rebus santan sambil diaduk agar tidak pecah.</li>
                    </ul>
                </li>

                <li><b>Memasak rendang:</b>
                    <ul>
                        <li>Masukkan bumbu halus, daging, dan semua daun rempah.</li>
                        <li>Masak dengan api kecil ±3 jam hingga kering dan berminyak.</li>
                        <li>Rendang siap disajikan.</li>
                    </ul>
                </li>
            </ol>
        </div>

    </div>
</div>

</body>
</html>
