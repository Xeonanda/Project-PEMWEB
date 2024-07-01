@extends('layouts.app')

@section('title', 'Pasar')

@section('content')
    <div class="container">
        <h1 class="mt-4">Pasar</h1>
        <div class="card">
            <div class="card-body">
                <a class="btn btn-success mb-3" href="{{ route('pasar.create') }}">Add Pasar</a>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Created By</th>
                            <th>Created At</th>
                            <th>Edited At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($pasar as $p)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>{{ $p->created_by }}</td>
                                <td>{{ $p->created_at }}</td>
                                <td>{{ $p->updated_at }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('pasar.edit', $p->id) }}">Edit</a>
                                    <form action="{{ route('pasar.destroy', $p->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus pasar ini?')">Delete</button>
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
