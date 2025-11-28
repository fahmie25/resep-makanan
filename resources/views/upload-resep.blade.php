@extends('layouts.app')

@section('content')

<div style="
    max-width: 600px;
    margin: 50px auto;
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
">

    <h2 style="
        text-align:center; 
        margin-bottom:30px;
        color:#B3261E;
        font-family: 'Playfair Display', serif;
    ">
        Upload Resep Baru
    </h2>

    <form action="{{ route('upload.resep') }}" method="POST" enctype="multipart/form-data">

        @csrf

        {{-- Nama --}}
        <label style="font-weight:600;">Nama Resep</label>
        <input type="text" name="nama" required
               style="width:100%; padding:10px; border-radius:8px; border:1px solid #ccc; margin-bottom:15px;">

        {{-- Bahan --}}
        <label style="font-weight:600;">Bahan</label>
        <textarea name="bahan" rows="4" required
                  style="width:100%; padding:10px; border-radius:8px; border:1px solid #ccc; margin-bottom:15px;"></textarea>

        {{-- Cara memasak --}}
        <label style="font-weight:600;">Cara Memasak</label>
        <textarea name="cara_masak" rows="5" required
                  style="width:100%; padding:10px; border-radius:8px; border:1px solid #ccc; margin-bottom:15px;"></textarea>

        {{-- Gambar --}}
        <label style="font-weight:600;">Upload Gambar</label>
        <input type="file" name="gambar" required
               style="margin-bottom:20px;">

        {{-- Tombol submit --}}
        <button type="submit" 
                style="
                    width:100%;
                    padding:12px;
                    background:#B3261E;
                    color:white;
                    font-size:16px;
                    border:none;
                    border-radius:8px;
                    cursor:pointer;
                ">
            Upload Resep
        </button>

    </form>

</div>

@endsection
