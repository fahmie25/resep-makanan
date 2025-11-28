@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2>Edit Resep</h2>

    <form action="{{ route('admin.resep.update', $resep->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nama Resep</label>
        <input type="text" name="nama" class="form-control mb-3" value="{{ $resep->nama }}" required>

        <label>Bahan</label>
        <textarea name="bahan" class="form-control mb-3" rows="5" required>{{ $resep->bahan }}</textarea>

        <label>Cara Memasak</label>
        <textarea name="cara_masak" class="form-control mb-3" rows="6" required>{{ $resep->cara_masak }}</textarea>

        <label>Gambar Saat Ini</label><br>
        <img src="{{ asset('storage/'.$resep->gambar) }}" width="120" class="mb-3">

        <label>Ganti Gambar (opsional)</label>
        <input type="file" name="gambar" class="form-control mb-4">

        <button class="btn btn-warning">Update</button>
    </form>

</div>
@endsection
