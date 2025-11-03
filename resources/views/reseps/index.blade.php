<!DOCTYPE html>
<html>
<head>
    <title>Daftar Resep Makanan</title>
</head>
<body>
    <h1>Daftar Resep Makanan</h1>

    <a href="{{ route('reseps.create') }}">Tambah Resep Baru</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 10px;">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Bahan</th>
            <th>Langkah</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>

        @forelse($reseps as $index => $resep)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $resep->judul }}</td>
                <td>{{ $resep->bahan }}</td>
                <td>{{ $resep->langkah }}</td>
                <td>
                    @if($resep->gambar)
                        <img src="{{ asset('storage/' . $resep->gambar) }}" width="100">
                    @else
                        Tidak ada
                    @endif
                </td>
                <td>
                    <a href="{{ route('reseps.edit', $resep->id) }}">Edit</a> |
                    <form action="{{ route('reseps.destroy', $resep->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" align="center">Belum ada resep.</td>
            </tr>
        @endforelse
    </table>
</body>
</html>
