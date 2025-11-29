@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #F8F1E3;
    }

    /* Wrapper tengah */
    .dashboard-wrapper {
        max-width: 1100px;
        width: 100%;
        margin: 0 auto;
    }

    /* Panel utama putih */
    .dashboard-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        border: 1px solid #f1e0cd;
    }

    /* Judul */
    .dashboard-title {
        font-family: "Playfair Display", serif;
        font-weight: 700;
        font-size: 30px;
        color: #B43124;
        text-align: center;
        margin-bottom: 4px;
    }

    .dashboard-subtitle {
        font-size: 13px;
        color: #8b6b4a;
        text-align: center;
        margin-bottom: 24px;
    }

    /* Tombol tambah resep */
    .btn-tambah {
        background: #E87D35;
        color: #fff;
        font-weight: 600;
        padding: 8px 16px;
        border-radius: 999px;
        text-decoration: none;
        font-size: 14px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.16);
        border: none;
    }

    .btn-tambah:hover {
        background: #cf6e30;
        color: #fff;
    }

    /* Stat cards */
    .stat-card {
        border-radius: 14px;
        border: 1px solid #f3e0c6;
        background: #FFF9F1;
        padding: 12px 16px;
    }

    .stat-label {
        font-size: 12px;
        color: #8b6b4a;
        margin-bottom: 2px;
    }

    .stat-value {
        font-size: 20px;
        font-weight: 700;
        color: #B43124;
    }

    /* Tabel */
    .table thead th {
        background: #fae8d2;
        border-bottom: 2px solid #e5c7a1;
        font-weight: 600;
        font-size: 13px;
    }

    .table tbody tr:hover {
        background: #fff4e6;
    }

    .table {
        width: 100% !important;   /* biar ikut penuh sampai tepi kanan panel */
        margin-bottom: 0;         /* ga ada gap bawah aneh */
    }

    .img-thumb {
        width: 85px;
        height: 60px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #e0d2c0;
    }

    /* Tombol Edit/Hapus */
    .aksi-group {
        display: flex;
        gap: 6px;
        align-items: center;
    }

    .aksi-group form {
        margin: 0;
    }

    .btn-aksi {
        border: none;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        text-decoration: none;
    }

    .btn-aksi-edit {
        background: #f4f4f7;
        color: #333;
    }

    .btn-aksi-hapus {
        background: #d9534f;
        color: #fff;
    }

    /* Pagination pill */
    .pagination {
        display: flex !important;
        justify-content: center !important;
        width: 100%;
        margin-top: 16px;
    }

    .pagination li {
        list-style-type: none;
    }

    .pagination li a,
    .pagination li span {
        padding: 6px 10px;
        border: 1px solid #d0b99b;
        background: #fae8d2;
        border-radius: 999px;
        color: #333;
        text-decoration: none;
        font-size: 13px;
    }

    .pagination li.active span {
        background: #d9534f;
        color: #fff;
        border-color: #d9534f;
    }

    @media (max-width: 768px) {
        .dashboard-card {
            padding: 18px !important;
        }
    }
</style>

<div class="d-flex justify-content-center w-100 py-4">
    <div class="dashboard-wrapper">

        <div class="dashboard-card p-4 p-md-5">

            {{-- Header --}}
            <div class="d-flex flex-column align-items-center mb-3">
                <h1 class="dashboard-title">Dashboard Admin</h1>
                <p class="dashboard-subtitle">
                    Kelola semua resep yang tampil di Rasa Nusantara.
                </p>

                <div class="mt-2">
                    <a href="{{ route('admin.resep.create') }}" class="btn-tambah">
                        ➕ Tambah Resep
                    </a>
                </div>
            </div>

            {{-- Stat cards --}}
            <div class="row g-3 mb-4">
                <div class="col-12 col-md-4">
                    <div class="stat-card">
                        <div class="stat-label">Total Resep</div>
                        <div class="stat-value">{{ $reseps->total() }}</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="stat-card">
                        <div class="stat-label">Resep di halaman ini</div>
                        <div class="stat-value">{{ $reseps->count() }}</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="stat-card">
                        <div class="stat-label">Total Halaman</div>
                        <div class="stat-value">{{ $reseps->lastPage() }}</div>
                    </div>
                </div>
            </div>

            {{-- Tabel --}}
            <div class="table-responsive mb-3">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th style="width:120px;">Gambar</th>
                            <th>Nama Resep</th>
                            <th style="width:170px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reseps as $r)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/'.$r->gambar) }}"
                                         class="img-thumb"
                                         alt="{{ $r->nama }}">
                                </td>
                                <td class="fw-semibold">
                                    {{ $r->nama }}
                                </td>
                                <td>
                                    <div class="aksi-group">

                                        <a href="{{ route('admin.resep.edit', $r->id) }}"
                                           class="btn-aksi btn-aksi-edit">
                                            ✏️ <span>Edit</span>
                                        </a>

                                        <form action="{{ route('admin.resep.destroy', $r->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Hapus resep ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-aksi btn-aksi-hapus">
                                                🗑️ <span>Hapus</span>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {{ $reseps->links() }}
            </div>

        </div>

    </div>
</div>

@endsection
