@extends('layouts.app')

@section('title', 'Pasar')

@section('content')
<div class="container">
    <h1 class="mt-4">Detail Pasar</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $pasar->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $pasar->name }}</td>
                </tr>
                <tr>
                    <th>Value</th>
                    <td>{{ $pasar->value }}</td>
                </tr>
                <tr>
                    <th>Created By</th>
                    <td>{{ $pasar->created_by }}</td>
                </tr>
                <tr>
                    <th>Edited By</th>
                    <td>{{ $pasar->edited_by }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $pasar->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $pasar->updated_at }}</td>
                </tr>
            </table>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('pasar.index') }}" class="btn btn-primary">Kembali</a>
                </div>
                <div>
                    <a class="btn btn-secondary" href="{{ route('pasar.edit', $pasar->id) }}">Edit</a>
                    <form action="{{ route('pasar.destroy', $pasar->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus pasar ini?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
