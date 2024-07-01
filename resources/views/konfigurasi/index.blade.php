@extends('layouts.app')

@section('title', 'Konfigurasi')

@section('content')
    <div class="container">
        <h1 class="mt-4">Konfigurasi</h1>
        <div class="card">
            <div class="card-body">
                <a class="btn btn-success mb-3" href="{{ route('konfigurasi.create') }}">Create New Konfigurasi</a>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Value</th>
                            <th>Created By</th>
                            <th>Edited By</th>
                            <th>Created At</th>
                            <th>Edited At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($konfigurasis as $konfigurasi)
                            <tr>
                                <td>{{ $konfigurasi->id }}</td>
                                <td>{{ $konfigurasi->name }}</td>
                                <td>{{ $konfigurasi->value }}</td>
                                <td>{{ $konfigurasi->created_by }}</td>
                                <td>{{ $konfigurasi->edited_by }}</td>
                                <td>{{ $konfigurasi->created_at }}</td>
                                <td>{{ $konfigurasi->updated_at }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('konfigurasi.edit', $konfigurasi->id) }}">Edit</a>
                                    <form action="{{ route('konfigurasi.destroy', $konfigurasi->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus konfigurasi ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
