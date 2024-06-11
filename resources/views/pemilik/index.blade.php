@extends('layouts.app')

@section('title', 'Pemilik')

@section('content')
    <div class="container">
        <h1 class="mt-4">Pemilik</h1>
        <a class="btn btn-success mb-3" href="{{ route('pemilik.create') }}">Create New Pemilik</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>NIK</th>
                    <th>No WA</th>
                    <th>No Telp</th>
                    <th>Created By</th>
                    <th>Edited By</th>
                    <th>Created At</th>
                    <th>Edited At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemilik as $pemilik)
                    <tr>
                        <td>{{ $pemilik->id }}</td>
                        <td>{{ $pemilik->nama }}</td>
                        <td>{{ $pemilik->alamat }}</td>
                        <td>{{ $pemilik->nik }}</td>
                        <td>{{ $pemilik->no_wa }}</td>
                        <td>{{ $pemilik->no_telp }}</td>
                        <td>{{ $pemilik->created_by }}</td>
                        <td>{{ $pemilik->edited_by }}</td>
                        <td>{{ $pemilik->created_at }}</td>
                        <td>{{ $pemilik->updated_at }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('pemilik.edit', $pemilik->id) }}">Edit</a>
                            <form action="{{ route('pemilik.destroy', $pemilik->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pemilik ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
