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
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .judul-resep span {
        font-size: 50px;
        margin-left: 10px;
    }

    .favorite-btn {
        border: none;
        background: none;
        cursor: pointer;
        font-size: 40px;
        color: #b30000;
        line-height: 1;
        padding: 0;
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

    @php
        // cek apakah user sudah login dan sudah mem-favorite resep ini
        $isFavorite = auth()->check()
            && auth()->user()->favoriteReseps->contains($resep->id);
    @endphp

    <h1 class="judul-resep">
        {{ $resep->nama }}
        <span>{{ $resep->kategori }}</span>

        {{-- tombol favorite --}}
        @auth
            <form action="{{ route('favorites.toggle', $resep->id) }}"
                  method="POST"
                  style="display:inline;">
                @csrf
                <button type="submit" class="favorite-btn">
                    {!! $isFavorite ? '★' : '☆' !!}
                </button>
            </form>
        @endauth
    </h1>

    <div class="detail-content">

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
