<!DOCTYPE html>
<html>
<head>
    <title>Tambah Resep</title>
</head>
<body>
    <h1>Tambah Resep Baru</h1>
    <form action="{{ route('reseps.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Judul:</label>
        <input type="text" name="judul"><br><br>

        <label>Bahan:</label>
        <textarea name="bahan"></textarea><br><br>

        <label>Langkah:</label>
        <textarea name="langkah"></textarea><br><br>

        <label>Gambar:</label>
        <input type="file" name="gambar"><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
