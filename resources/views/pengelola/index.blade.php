@extends('layouts.app')

@section('title', 'Pengelola')

@section('content')
    <div class="container">
        <h1 class="mt-4">Pengelola</h1>
        <a class="btn btn-success mb-3" href="{{ route('pengelola.create') }}">Create New Pengelola</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>ID User</th>
                    <th>ID Pasar</th>
                    <th>Created By</th>
                    <th>Edited By</th>
                    <th>Created At</th>
                    <th>Edited At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                $count = 1;
                @endphp
                @foreach ($pengelola as $p)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->id_user }}</td>
                        <td>{{ $p->id_pasar }}</td>
                        <td>{{ $p->created_by }}</td>
                        <td>{{ $p->edited_by }}</td>
                        <td>{{ $p->created_at }}</td>
                        <td>{{ $p->updated_at }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('pengelola.edit', $p->id) }}">Edit</a>
                            <form action="{{ route('pengelola.destroy', $p->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Pengelola ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
