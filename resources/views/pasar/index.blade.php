@extends('layouts.app')

@section('title', 'Pasar')

@section('content')
<body>
    <h1>Pasar</h1>
    <a class="btn btn-success mb-3" href="{{ route('pasar.create') }}">Create New Pasar</a>
    
    <br>
    <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Created By</th>
            {{-- <th>Edited By</th> --}}
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
                {{-- <td>{{ $p->edited_by }}</td> --}}
                <td>{{ $p->created_at }}</td>
                <td>{{ $p->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('pasar.edit', $p->id) }}">Edit</a>
                    
                    {{-- Move the delete form inline with edit link --}}
                    <form action="{{ route('pasar.destroy', $p->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pasar ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
@endsection
