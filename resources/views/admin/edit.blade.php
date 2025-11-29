@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #F8F1E3;
    }

    .edit-wrapper {
        max-width: 900px;
        width: 100%;
        margin: 0 auto;
    }

    .card-form {
        background: #ffffff;
        border-radius: 18px;
        padding: 36px;
        box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        border: 1px solid #eddcc8;
    }

    .title-form {
        font-family: "Playfair Display", serif;
        font-weight: 700;
        font-size: 30px;
        color: #B43124;
        text-align: center;
        margin-bottom: 26px;
    }

    /* Tombol kembali manis */
    .btn-back-aesthetic {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(6px);
        border: 1px solid #e5d7c8;
        border-radius: 999px;
        font-size: 14px;
        color: #6b4f3b;
        font-weight: 600;
        text-decoration: none;
        box-shadow: 0 3px 10px rgba(0,0,0,0.06);
        transition: 0.25s;
    }

    .btn-back-aesthetic:hover {
        background: #fff4eb;
        border-color: #d8c1a8;
        color: #B43124;
        transform: translateY(-1px);
    }

    .form-label {
        font-weight: 600;
        color: #4e3d2c;
        font-size: 14px;
        margin-bottom: 4px;
    }

    .form-control {
        width: 100%;
        border-radius: 10px;
        border-color: #d8c9b7;
        font-size: 14px;
        padding: 10px;
    }

    .form-control:focus {
        border-color: #E87D35;
        box-shadow: 0 0 0 0.15rem rgba(232,125,53,0.3);
    }

    textarea.form-control {
        resize: none;
    }

    .btn-save {
        background: #E87D35;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        width: 100%;
        font-size: 15px;
        font-weight: 600;
        margin-top: 8px;
    }

    .btn-save:hover {
        background: #cf6e30;
        color: #fff;
    }

    .img-preview {
        width: 100%;
        max-width: 260px;
        height: 180px;
        object-fit: cover;
        border-radius: 14px;
        border: 1px solid #e0d2c0;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        margin-bottom: 8px;
    }

    .img-note {
        font-size: 11px;
        color: #8b6b4a;
    }
</style>

<div class="container py-4">

    {{-- Tombol kembali di kiri atas --}}
    <div class="mb-3">
        <a href="{{ url('/admin/resep') }}" class="btn-back-aesthetic">
            ← Kembali ke daftar
        </a>
    </div>

    <div class="edit-wrapper">
        <div class="card-form">

            <h2 class="title-form">Edit Resep</h2>

            <div class="row g-4">
                {{-- Form kiri --}}
                <div class="col-md-7">
                    <form action="{{ route('admin.resep.update', $resep->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama Resep</label>
                            <input type="text"
                                   name="nama"
                                   class="form-control"
                                   value="{{ old('nama', $resep->nama) }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bahan</label>
                            <textarea name="bahan"
                                      rows="3"
                                      class="form-control"
                                      required>{{ old('bahan', $resep->bahan) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cara Memasak</label>
                            <textarea name="cara_masak"
                                      rows="3"
                                      class="form-control"
                                      required>{{ old('cara_masak', $resep->cara_masak) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Ganti Gambar <span style="font-size:11px; color:#8b6b4a;">(opsional)</span>
                            </label>
                            <input type="file" name="gambar" class="form-control">
                        </div>

                        <button type="submit" class="btn-save">
                            Simpan Perubahan
                        </button>
                    </form>
                </div>

                {{-- Preview kanan --}}
                <div class="col-md-5 d-flex flex-column align-items-center align-items-md-start">
                    <label class="form-label mb-2">Gambar Saat Ini</label>
                    <img src="{{ asset('storage/'.$resep->gambar) }}" alt="Gambar Resep" class="img-preview">

                    <p class="img-note mb-0">
                        Pastikan gambar baru punya komposisi mirip dan ukuran proporsional
                        agar tampilan halaman utama tetap konsisten.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
