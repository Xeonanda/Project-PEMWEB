@extends('layouts.app')

@section('title', 'Konfigurasi Pengelola')

@section('content')
<div class="container">
    <h1 class="mt-4">Detail Pengelola</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $pengelola->id }}</td>
                </tr>
                <tr>
                    <th>ID User</th>
                    <td>{{ $pengelola->id_user }}</td>
                </tr>
                <tr>
                    <th>ID Pasar</th>
                    <td>{{ $pengelola->pasar->nama }}</td>
                </tr>
                <tr>
                    <th>Created By</th>
                    <td>{{ $pengelola->created_by }}</td>
                </tr>
                <tr>
                    <th>Edited By</th>
                    <td>{{ $pengelola->edited_by }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $pengelola->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $pengelola->updated_at }}</td>
                </tr>
            </table>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('pengelola.index') }}" class="btn btn-primary">Kembali</a>
                </div>
                <div>
                    <a class="btn btn-secondary" href="{{ route('pengelola.edit', $pengelola->id) }}">Edit</a>
                    <form action="{{ route('pengelola.destroy', $pengelola->id) }}" method="POST" class="d-inline">
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
