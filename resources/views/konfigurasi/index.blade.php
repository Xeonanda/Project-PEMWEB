@extends('layouts.app')

@section('title', 'Konfigurasis')

@section('content')
    <div class="container">
        <h1 class="mt-4">Konfigurasis</h1>
        <a class="btn btn-success mb-3" href="{{ route('konfigurasis.create') }}">Create New KOnfigurasi</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Created By</th>
                    <th>Edited By</th>
                    <th>Created At</th>
                    <th>Edited At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($konfigurasis as $konfigurasi)
                    <tr>
                        <td>{{ $konfigurasi->id }}</td>
                        <td>{{ $konfigurasi->name }}</td>
                        <td>{{ $konfigurasi->value}}</td>
                        <td>{{ $konfigurasi->created_by }}</td>
                        <td>{{ $konfigurasi->edited_by }}</td>
                        <td>{{ $konfigurasi->created_at }}</td>
                        <td>{{ $konfigurasi->updated_at }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('konfigurasis.edit', $konfigurasi->id) }}">Edit</a>
                            <form action="{{ route('konfigurasis.destroy', $konfigurasi->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus konfigurasi ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
