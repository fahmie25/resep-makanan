@extends('layouts.app')

@section('content')

<style>
    body {
        background: #f5eddc;
        font-family: 'Georgia', serif;
    }

    .detail-container {
        padding: 40px 70px;
    }

    .back-btn {
        font-size: 32px;
        text-decoration: none;
        color: #800000;
        font-weight: bold;
    }

    .judul-resep {
        font-size: 95px;
        font-weight: bold;
        color: #7a0000;
        margin-bottom: 10px;
        line-height: 0.9;
    }

    .judul-resep span {
        font-size: 50px;
        margin-left: 10px;
    }

    .detail-content {
        display: flex;
        gap: 40px;
        margin-top: 20px;
    }

    .gambar-resep img {
        width: 350px;
        border-radius: 12px;
    }

    .bahan, .cara {
        width: 40%;
    }

    .bahan h2, .cara h2 {
        font-size: 28px;
        color: #5a0000;
        margin-bottom: 10px;
        font-weight: bold;
    }

    ul, ol {
        padding-left: 20px;
        font-size: 17px;
        line-height: 1.5;
    }
</style>

<div class="detail-container">

    <a href="{{ route('reseps.index') }}" class="back-btn">←</a>

    <h1 class="judul-resep">
        {{ $resep->nama }} 
        <span>{{ $resep->kategori }}</span>
    </h1>

    <div class="detail-content">

        <div class="gambar-resep">
            <img src="{{ asset('storage/' . $resep->gambar) }}" alt="{{ $resep->nama }}">
        </div>

        <div class="bahan">
            <h2>Bahan-bahan :</h2>
            <ul>
                @foreach(explode("\n", $resep->bahan) as $b)
                    <li>{{ $b }}</li>
                @endforeach
            </ul>
        </div>

        <div class="cara">
            <h2>Cara Pembuatan :</h2>
            <ol>
                @foreach(explode("\n", $resep->cara_masak) as $step)
                    <li>{{ $step }}</li>
                @endforeach
            </ol>
        </div>

    </div>
</div>

@endsection
