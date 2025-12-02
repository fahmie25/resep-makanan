@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 30px; margin-bottom: 40px;">

    {{-- TITLE --}}
    <h1 style="font-family:'Playfair Display'; color:#B3261E; text-align:center; font-size:36px;">
        Statistik Favorite
    </h1>

    <p style="text-align:center; color:#876445; margin-top:-5px;">
        Menu paling sering ditambahkan ke Favorite oleh pengguna.
    </p>

    {{-- WRAPPER CARD --}}
    <div style="
        background:#FFF8EC;
        padding:30px;
        border-radius:24px;
        margin-top:30px;
        box-shadow:0 18px 40px rgba(0,0,0,0.08);
        border:1px solid #F1E0CD;
    ">

        {{-- KARTU UTAMA: GRAFIK + TABEL --}}
        <div style="
            background:
                radial-gradient(circle at 0% 0%, rgba(255,208,149,0.28), transparent 55%),
                radial-gradient(circle at 100% 0%, rgba(248,113,113,0.24), transparent 55%),
                linear-gradient(135deg, #7C2418, #2C0F0C);
            padding:22px 22px 26px;
            border-radius:20px;
            color:white;
            border:1px solid rgba(255,255,255,0.16);
        ">

            {{-- HEADER ATAS --}}
            <div style="display:flex; justify-content:space-between; gap:20px; align-items:flex-start;">
                <div>
                    <div style="color:#FBC9A5; font-size:13px; letter-spacing:0.03em;">
                        Menu paling difavoritkan
                    </div>

                    <div style="font-size:30px; font-weight:700; margin-top:4px;">
                        {{ $mostFav ? $mostFav->nama : '-' }}
                    </div>

                    <div style="color:#FDE5D0; font-size:12px; margin-top:4px;">
                        Total favorite: {{ $totalFav }}
                    </div>
                </div>

                <div style="text-align:right;">
                    <div style="
                        display:inline-flex;
                        align-items:center;
                        gap:6px;
                        padding:5px 12px;
                        border-radius:999px;
                        background:rgba(0,0,0,0.22);
                        border:1px solid rgba(252,211,77,0.6);
                        font-size:11px;
                        color:#FDE68A;
                    ">
                        <span style="width:7px; height:7px; border-radius:999px; background:#FBBF24;"></span>
                        Top 5 menu favorit
                    </div>

                    <div style="
                        margin-top:8px;
                        display:flex;
                        justify-content:flex-end;
                        gap:6px;
                        align-items:center;
                    ">
                        <div style="
                            background:linear-gradient(145deg, #F97316, #B3261E);
                            width:26px;
                            height:26px;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            border-radius:999px;
                            font-weight:bold;
                            font-size:14px;
                            box-shadow:0 8px 18px rgba(0,0,0,0.35);
                        ">↑</div>

                        <div style="
                            font-size:11px;
                            color:#FDE5D0;
                            padding:4px 10px;
                            border-radius:999px;
                            border:1px solid rgba(248,250,252,0.2);
                            background:rgba(15,23,42,0.16);
                        ">
                            Rasa Nusantara
                        </div>
                    </div>
                </div>
            </div>

            {{-- BODY: CHART + TABEL --}}
            <div style="
                display:flex;
                gap:24px;
                margin-top:20px;
                align-items:stretch;
                flex-wrap:wrap;
            ">

                {{-- CHART --}}
                <div style="
                    flex:2;
                    min-height:210px;
                    padding-right:6px;
                ">
                    <div style="
                        background:rgba(0,0,0,0.22);
                        border-radius:16px;
                        padding:12px 14px 16px;
                        box-shadow:inset 0 0 0 1px rgba(255,255,255,0.04);
                    ">
                        <canvas id="favoriteChart" style="width:100%; height:180px;"></canvas>
                    </div>
                </div>

                {{-- TABEL SAMPING --}}
                <div style="
                    flex:1.1;
                    background:rgba(0,0,0,0.24);
                    border-radius:16px;
                    padding:12px 14px;
                    font-size:12px;
                    color:#F9FAFB;
                    box-shadow:inset 0 0 0 1px rgba(255,255,255,0.06);
                ">
                    <div style="font-weight:600; margin-bottom:6px; color:#FDE5D0; font-size:12px;">
                        Daftar Menu Paling Difavoritkan
                    </div>

                    <div style="
                        max-height:190px;
                        overflow-y:auto;
                        padding-right:4px;
                        margin-top:6px;
                    ">
                        <table style="width:100%; border-collapse:collapse;">
                            <thead>
                                <tr style="border-bottom:1px solid rgba(248,250,252,0.15);">
                                    <th style="text-align:left; padding:4px 0; font-weight:600; font-size:11px; color:#FBC9A5; width:14px;">#</th>
                                    <th style="text-align:left; padding:4px 0; font-weight:600; font-size:11px; color:#FBC9A5;">Nama Menu</th>
                                    <th style="text-align:right; padding:4px 0; font-weight:600; font-size:11px; color:#FBC9A5;">
                                        Total Favorite
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topMenus as $index => $menu)
                                    @php
                                        $isTop = $index === 0;
                                    @endphp
                                    <tr style="
                                        background:{{ $isTop ? 'rgba(248,113,113,0.24)' : ($index % 2 == 0 ? 'rgba(0,0,0,0.12)' : 'transparent') }};
                                    ">
                                        <td style="padding:4px 0;">
                                            <span style="
                                                display:inline-flex;
                                                align-items:center;
                                                justify-content:center;
                                                width:18px;
                                                height:18px;
                                                border-radius:999px;
                                                font-size:10px;
                                                font-weight:600;
                                                background:{{ $isTop ? '#FBBF24' : 'rgba(15,23,42,0.8)' }};
                                                color:{{ $isTop ? '#7C2418' : '#E5E7EB' }};
                                            ">
                                                {{ $index + 1 }}
                                            </span>
                                        </td>
                                        <td style="padding:4px 0; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                            {{ $menu->nama }}
                                        </td>
                                        <td style="padding:4px 0; text-align:right;">
                                            {{ $menu->favorites_count }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

{{-- CHART JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = {!! json_encode($labels) !!};
    const data   = {!! json_encode($data) !!};

    const ctx = document.getElementById('favoriteChart').getContext('2d');

    // Gradient bar warna Rasa Nusantara (kuning -> oranye -> merah)
    const gradient = ctx.createLinearGradient(0, 0, 0, 200);
    gradient.addColorStop(0, '#FACC15');  // kuning
    gradient.addColorStop(0.5, '#FB923C'); // oranye
    gradient.addColorStop(1, '#B3261E');   // merah

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Favorite',
                data: data,
                backgroundColor: gradient,
                borderRadius: 10,
                borderSkipped: false,
                maxBarThickness: 60,
                hoverBackgroundColor: gradient,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 900,
                easing: 'easeOutQuart'
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#020617',
                    titleColor: '#F9FAFB',
                    bodyColor: '#E5E7EB',
                    borderColor: '#FBBF24',
                    borderWidth: 1,
                    padding: 8,
                    displayColors: false
                }
            },
            scales: {
                x: {
                    ticks: {
                        color:'#FDE5D0',
                        font:{ size:11 },
                        maxRotation: 35,
                        minRotation: 15
                    },
                    grid: { display:false }
                },
                y: {
                    ticks: {
                        color:'#E5D2B0',
                        font:{ size:11 },
                        precision:0
                    },
                    grid: {
                        color:'rgba(249,250,251,0.12)',
                        drawBorder:false
                    }
                }
            }
        }
    });
</script>
@endsection
