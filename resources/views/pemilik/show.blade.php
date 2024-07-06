@extends('layouts.app')

@section('title', 'Konfigurasi')

@section('content')
<div class="container">
    <h1 class="mt-4">Detail Pemilik</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $pemilik->id }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $pemilik->nama }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $pemilik->alamat }}</td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td>{{ $pemilik->nik }}</td>
                </tr>
                <tr>
                    <th>No WA</th>
                    <td>{{ $pemilik->no_wa }}</td>
                </tr>
                <tr>
                    <th>No Telp</th>
                    <td>{{ $pemilik->no_telp }}</td>
                </tr>
                <tr>
                    <th>Created By</th>
                    <td>{{ $pemilik->created_by }}</td>
                </tr>
                <tr>
                    <th>Edited By</th>
                    <td>{{ $pemilik->edited_by }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $pemilik->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $pemilik->updated_at }}</td>
                </tr>
            </table>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('pemilik.index') }}" class="btn btn-primary">Kembali</a>
                </div>
                <div>
                    <a class="btn btn-secondary" href="{{ route('pemilik.edit', $pemilik->id) }}">Edit</a>
                    <form action="{{ route('pemilik.destroy', $pemilik->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus pemilik ini?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
