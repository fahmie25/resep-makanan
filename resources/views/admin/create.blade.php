@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #F8F1E3;
    }

    /* Wrapper form */
    .upload-wrapper {
        max-width: 650px;
        width: 100%;
        margin: 0 auto;
    }

    .card-form {
        background: #ffffff;
        border-radius: 18px;
        padding: 40px;
        box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        border: 1px solid #eddcc8;
    }

    /* Title */
    .title-form {
        font-family: "Playfair Display", serif;
        font-weight: 700;
        font-size: 30px;
        color: #B43124;
        text-align: center;
        margin-bottom: 30px;
    }

    /* Back Button */
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

    /* Form */
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

    /* Submit Button */
    .btn-submit {
        background: #B43124;
        color: #fff;
        border: none;
        padding: 12px 20px;
        border-radius: 10px;
        width: 100%;
        font-size: 15px;
        font-weight: 600;
        margin-top: 10px;
    }

    .btn-submit:hover {
        background: #95291d;
        color: #fff;
    }

</style>


<div class="container py-4">

    {{-- Back Button --}}
    <div class="mb-3">
        <a href="{{ url('/admin/resep') }}" class="btn-back-aesthetic">← Kembali</a>
    </div>

    {{-- Form --}}
    <div class="upload-wrapper">
        <div class="card-form">

            <h2 class="title-form">Tambah Resep Baru</h2>

            <form action="{{ route('admin.resep.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Resep</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Bahan</label>
                    <textarea name="bahan" rows="3" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cara Memasak</label>
                    <textarea name="cara_masak" rows="3" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Gambar</label>
                    <input type="file" name="gambar" class="form-control" required>
                </div>

                <button type="submit" class="btn-submit">Simpan Resep</button>

            </form>

        </div>
    </div>

</div>

@endsection
