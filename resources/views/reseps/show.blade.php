@extends('layouts.app')

@section('content')

<style>
    body {
        background: #F8F1E3;
        font-family: 'Nunito', sans-serif;
    }

    /* ============= PAGE FADE IN ============= */
    .detail-animate {
        opacity: 0;
        animation: fadeInPage 0.8s ease-out forwards;
    }
    @keyframes fadeInPage {
        to {
            opacity: 1;
        }
    }

    /* ============= ANIMASI JUDUL PER KATA ============= */
    .judul-besar span,
    .judul-kecil span {
        opacity: 0;
        transform: translateY(20px);
        display: inline-block;
        animation: titleAnim 0.6s ease-out forwards;
    }
    @keyframes titleAnim {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ============= GAMBAR SLIDE IN ============= */
    .img-animate {
        opacity: 0;
        transform: translateX(-40px);
        animation: imgSlide 0.8s ease-out forwards;
        animation-delay: 0.3s;
    }
    @keyframes imgSlide {
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* ============= BAHAN STAGGER ANIMATION ============= */
    .bahan-list li {
        opacity: 0;
        transform: translateX(20px);
        animation: bahanAnim 0.45s ease-out forwards;
    }
    @keyframes bahanAnim {
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* ============= LANGKAH STAGGER ============= */
    .langkah-list li {
        opacity: 0;
        transform: translateY(20px);
        animation: langkahAnim 0.45s ease-out forwards;
    }
    @keyframes langkahAnim {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ============= WRAPPER ============= */
    .detail-wrapper {
        width: 90%;
        max-width: 1400px;
        margin: 40px auto;
        display: grid;
        grid-template-columns: 1.1fr 1.3fr;
        gap: 50px;
    }

    .judul-besar {
        font-family: 'Playfair Display', serif;
        font-size: 95px;
        font-weight: 700;
        color: #B3261E;
        line-height: 0.8;
    }

    .judul-kecil {
        font-family: 'Playfair Display', serif;
        font-size: 48px;
        color: #B3261E;
        margin-left: 20px;
        margin-top: -15px;
    }

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

    .fav-wrapper {
        position: absolute;
        top: 30px;
        right: 40px;
    }

</style>

{{-- PAGE WRAPPER WITH FADE-IN --}}
<div class="detail-animate">

    {{-- WRAPPER JUDUL ATAS --}}
    <div style="position: relative; width: 90%; max-width:1400px; margin:auto;">

        {{-- TOMBOL FAVORITE --}}
        <div class="fav-wrapper">
            <x-favorite-star :resep="$resep" />
        </div>

        {{-- JUDUL MUNCUL PER KATA --}}
        <div class="judul-besar">
            @foreach(explode(' ', $resep->nama) as $i => $word)
                <span style="animation-delay: {{ $i * 0.15 }}s">{{ $word }}</span>
            @endforeach
        </div>

        <div class="judul-kecil">
            @foreach(array_slice(explode(' ', $resep->nama), 1) as $j => $word)
                <span style="animation-delay: {{ 0.4 + $j * 0.15 }}s">{{ $word }}</span>
            @endforeach
        </div>

    </div>

    {{-- MAIN CONTENT --}}
    <div class="detail-wrapper">

        {{-- KOLOM KIRI = GAMBAR + BAHAN --}}
        <div class="kolom-kiri">

            {{-- GAMBAR SLIDE-IN --}}
            <img src="{{ asset('storage/' . $resep->gambar) }}"
                 alt="{{ $resep->nama }}"
                 class="img-animate">

            {{-- BAHAN --}}
            <div class="sub-title">Bahan-bahan :</div>

            <ul class="bahan-list">
                @foreach(explode("\n", $resep->bahan) as $index => $bahan)
                    @if(trim($bahan) !== '')
                        <li style="animation-delay: {{ 0.6 + $index * 0.12 }}s;">
                            {{ $bahan }}
                        </li>
                    @endif
                @endforeach
            </ul>

        </div>

        {{-- KOLOM KANAN = LANGKAH --}}
        <div>

            <div class="sub-title" style="text-align:center;">Cara Pembuatan :</div>

            <ol class="langkah-list">
                @foreach(explode("\n", $resep->cara_masak) as $index => $step)
                    @if(trim($step) !== '')
                        <li style="animation-delay: {{ 0.8 + $index * 0.12 }}s;">
                            {{ $step }}
                        </li>
                    @endif
                @endforeach
            </ol>

        </div>

    </div>

</div>

@endsection
