@extends('layouts.app')

@section('content')

<style>
    body {
        background: #F8F1E3;
        font-family: 'Nunito', sans-serif;
    }

    .detail-container {
        padding: 40px 70px;
    }

    .judul-resep {
        font-family: 'Playfair Display', serif;
        font-size: 68px;
        font-weight: 700;
        color: #B3261E;
        margin: 0 0 20px 0;
        line-height: 1.1;
    }

    .detail-content {
        display: grid;
        grid-template-columns: 1.1fr 1.4fr;
        gap: 40px;
        align-items: flex-start;
        margin-top: 10px;
    }

    .gambar-resep img {
        width: 100%;
        max-width: 430px;
        border-radius: 18px;
        display: block;
    }

    .bahan, .cara {
        margin-top: 20px;
    }

    .bahan h2, .cara h2 {
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        color: #B3261E;
        margin-bottom: 10px;
    }

    ul, ol {
        padding-left: 20px;
        font-size: 16px;
        line-height: 1.6;
        margin-top: 0;
    }
</style>

<div class="detail-container">

    {{-- JUDUL DI ATAS, TANPA TOMBOL BACK --}}
    <h1 class="judul-resep">
        {{ $resep->nama }}
    </h1>

    <div class="detail-content">

        {{-- KOLOM KIRI: FOTO + BAHAN --}}
        <div>
            <div class="gambar-resep">
                <img src="{{ asset('storage/' . $resep->gambar) }}" alt="{{ $resep->nama }}">
            </div>

            <div class="bahan">
                <h2>Bahan-bahan :</h2>
                <ul>
                    @foreach(explode("\n", $resep->bahan) as $b)
                        @if(trim($b) !== '')
                            <li>{{ $b }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- KOLOM KANAN: CARA PEMBUATAN --}}
        <div class="cara">
            <h2>Cara Pembuatan :</h2>
            <ol>
                @foreach(explode("\n", $resep->cara_masak) as $step)
                    @if(trim($step) !== '')
                        <li>{{ $step }}</li>
                    @endif
                @endforeach
            </ol>
        </div>

    </div>
</div>

@endsection
