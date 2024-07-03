@extends('layouts.app')

@section('title', 'Konfigurasi')

@section('content')
<div class="container">
    <h1 class="mt-4">Detail Konfigurasi</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $konfigurasi->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $konfigurasi->name }}</td>
                </tr>
                <tr>
                    <th>Value</th>
                    <td>{{ $konfigurasi->value }}</td>
                </tr>
                <tr>
                    <th>Created By</th>
                    <td>{{ $konfigurasi->created_by }}</td>
                </tr>
                <tr>
                    <th>Edited By</th>
                    <td>{{ $konfigurasi->edited_by }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $konfigurasi->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $konfigurasi->updated_at }}</td>
                </tr>
            </table>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('konfigurasi.index') }}" class="btn btn-primary">Kembali</a>
                </div>
                <div>
                    <a class="btn btn-secondary" href="{{ route('konfigurasi.edit', $konfigurasi->id) }}">Edit</a>
                    <form action="{{ route('konfigurasi.destroy', $konfigurasi->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus konfigurasi ini?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
