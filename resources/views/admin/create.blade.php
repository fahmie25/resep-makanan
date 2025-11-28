@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2>Tambah Resep Baru</h2>

    <form action="{{ route('admin.resep.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nama Resep</label>
        <input type="text" name="nama" class="form-control mb-3" required>

        <label>Bahan</label>
        <textarea name="bahan" class="form-control mb-3" rows="5" required></textarea>

        <label>Cara Memasak</label>
        <textarea name="cara_masak" class="form-control mb-3" rows="6" required></textarea>

        <label>Gambar</label>
        <input type="file" name="gambar" class="form-control mb-4" required>

        <button class="btn btn-primary">Simpan</button>
    </form>

</div>
@endsection
