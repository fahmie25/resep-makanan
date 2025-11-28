@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h1 class="mb-4">Dashboard Admin</h1>

    <a href="{{ route('admin.resep.create') }}" class="btn btn-primary mb-3">+ Tambah Resep</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama Resep</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reseps as $r)
            <tr>
                <td><img src="{{ asset('storage/'.$r->gambar) }}" width="90" class="rounded"></td>
                <td>{{ $r->nama }}</td>
                <td>
                    <a href="{{ route('admin.resep.edit', $r->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.resep.destroy', $r->id) }}" method="POST" style="display:inline-block">
                        @csrf 
                        @method('DELETE')
                        <button onclick="return confirm('Hapus resep ini?')" class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
    {{ $reseps->links() }}
    </div>

</div>

@endsection
