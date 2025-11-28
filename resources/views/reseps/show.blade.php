@extends('layouts.app')

@section('content')

<style>
    body {
        background: #F8F1E3;
        font-family: 'Nunito', sans-serif;
    }

    .detail-wrapper {
        width: 90%;
        max-width: 1400px;
        margin: 40px auto;
        display: grid;
        grid-template-columns: 1.1fr 1.3fr;
        gap: 50px;
    }

    /* JUDUL UTAMA */
    .judul-besar {
        font-family: 'Playfair Display', serif;
        font-size: 95px;
        font-weight: 700;
        color: #B3261E;
        line-height: 0.8;
    }

    /* SUB JUDUL */
    .judul-kecil {
        font-family: 'Playfair Display', serif;
        font-size: 48px;
        color: #B3261E;
        margin-left: 20px;
        margin-top: -15px;
    }

    /* STAR FAVORITE DI POJOK */
    .fav-wrapper {
        position: absolute;
        top: 30px;
        right: 40px;
    }

    /* KOLOM KIRI */
    .kolom-kiri img {
        width: 100%;
        max-width: 420px;
        border-radius: 20px;
        display: block;
        margin-bottom: 20px;
    }

    .sub-title {
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        color: #B3261E;
        margin: 10px 0;
    }

    ul, ol {
        font-size: 17px;
        line-height: 1.7;
    }

</style>


{{-- WRAPPER JUDUL ATAS --}}
<div style="position: relative; width: 90%; max-width:1400px; margin:auto;">

    {{-- TOMBOL FAVORITE --}}
    <div class="fav-wrapper">
        <x-favorite-star :resep="$resep" />
    </div>

    {{-- JUDUL SEPERTI FIGMA --}}
    <div class="judul-besar">{{ explode(' ', $resep->nama)[0] }}</div>
    <div class="judul-kecil">
        {{ implode(' ', array_slice(explode(' ', $resep->nama), 1)) }}
    </div>
</div>



{{-- MAIN CONTENT --}}
<div class="detail-wrapper">

    {{-- KOLOM KIRI = GAMBAR + BAHAN --}}
    <div class="kolom-kiri">

        {{-- GAMBAR --}}
        <img src="{{ asset('storage/' . $resep->gambar) }}" alt="{{ $resep->nama }}">

        {{-- BAHAN --}}
        <div class="sub-title">Bahan-bahan :</div>

        <ul>
            @foreach(explode("\n", $resep->bahan) as $bahan)
                @if(trim($bahan) !== '')
                    <li>{{ $bahan }}</li>
                @endif
            @endforeach
        </ul>

    </div>



    {{-- KOLOM KANAN = CARA PEMBUATAN --}}
    <div>

        <div class="sub-title" style="text-align:center;">Cara Pembuatan :</div>

        <ol>
            @foreach(explode("\n", $resep->cara_masak) as $step)
                @if(trim($step) !== '')
                    <li style="margin-bottom: 8px;">{{ $step }}</li>
                @endif
            @endforeach
        </ol>

    </div>

</div>

@endsection
