@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 30px; margin-bottom: 40px;">

    <h1 style="font-family:'Playfair Display'; color:#B3261E; text-align:center; font-size:36px;">
        Statistik Favorite
    </h1>

    <p style="text-align:center; color:#876445; margin-top:-5px;">
        Menu paling sering ditambahkan ke Favorite oleh pengguna.
    </p>

    <div style="
        background:#FFF8EC;
        padding:30px;
        border-radius:22px;
        margin-top:30px;
        box-shadow:0 8px 20px rgba(0,0,0,0.05);
    ">

        {{-- KARTU HITAM --}}
        <div style="
            background:radial-gradient(circle at top, #2F4F39, #05070B);
            padding:22px 20px 26px;
            border-radius:18px;
            color:white;
        ">

            <div style="display:flex; justify-content:space-between;">
                <div>
                    <div style="color:#9CA3AF; font-size:13px;">Menu paling difavoritkan</div>

                    <div style="font-size:28px; font-weight:700;">
                        {{ $mostFav ? $mostFav->nama : '-' }}
                    </div>

                    <div style="color:#9CA3AF; font-size:12px;">
                        Total favorite: {{ $totalFav }}
                    </div>
                </div>

                <div style="text-align:right;">
                    <div style="
                        background:rgba(34,197,94,0.2);
                        padding:5px 12px;
                        border-radius:20px;
                        font-size:12px;
                        color:#4ade80;
                        font-weight:600;
                    ">
                        Rasa Nusantara
                    </div>

                    <div style="
                        background:linear-gradient(145deg, #16a34a, #22c55e);
                        width:26px;
                        height:26px;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        border-radius:100px;
                        margin-top:6px;
                        font-weight:bold;
                    ">↑</div>
                </div>
            </div>

            <div style="margin-top:14px; height:160px;">
                <canvas id="favoriteChart"></canvas>
            </div>
        </div>

        {{-- TABEL --}}
        <h3 style="font-family:'Playfair Display'; color:#B3261E; margin-top:30px;">
            Daftar Menu Paling Difavoritkan
        </h3>

        <table class="table" style="background:white; border-radius:14px; overflow:hidden;">
            <thead style="background:#FFE8CF;">
                <tr>
                    <th>#</th>
                    <th>Nama Menu</th>
                    <th style="text-align:right;">Total Favorite</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($topMenus as $index => $menu)
                    <tr style="background:{{ $index % 2 == 0 ? '#FFF4E4' : 'white' }}">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $menu->nama }}</td>
                        <td style="text-align:right;">{{ $menu->favorites_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

{{-- CHART JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = {!! json_encode($labels) !!};
    const data   = {!! json_encode($data) !!};

    const ctx = document.getElementById('favoriteChart').getContext('2d');

    const gradient = ctx.createLinearGradient(0, 0, 0, 180);
    gradient.addColorStop(0, '#22c55e');
    gradient.addColorStop(1, '#065f46');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Favorite',
                data: data,
                backgroundColor: gradient,
                borderRadius: 6,
                borderSkipped: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 1000,
                easing: 'easeOutQuart'
            },
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: {
                    ticks: { color:'#ccc' },
                    grid: { display: false }
                },
                y: {
                    ticks: { color:'#aaa' },
                    grid: { color:'rgba(255,255,255,0.1)' }
                }
            }
        }
    });
</script>

@endsection
