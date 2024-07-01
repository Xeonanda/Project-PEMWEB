@extends('layouts.app')

@section('title', 'Tenants')

@section('content')
    <div class="container">
        <h1 class="mt-4">Tenants</h1>
        <div class="card">
            <div class="card-body">
                <a class="btn btn-success mb-3" href="{{ route('tenants.create') }}">Create New Tenant</a>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>ID Pemilik</th>
                            <th>Latitude Tenant</th>
                            <th>Longitude Tenant</th>
                            <th>Harga Iuran</th>
                            <th>ID Pasar</th>
                            <th>Created By</th>
                            <th>Edited By</th>
                            <th>Created At</th>
                            <th>Edited At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tenants as $tenant)
                            <tr>
                                <td>{{ $tenant->id }}</td>
                                <td>{{ $tenant->nama }}</td>
                                <td>{{ $tenant->id_pemilik }}</td>
                                <td>{{ $tenant->latitude_tenant }}</td>
                                <td>{{ $tenant->longitude_tenant }}</td>
                                <td>{{ $tenant->harga_iuran }}</td>
                                <td>{{ $tenant->id_pasar }}</td>
                                <td>{{ $tenant->created_by }}</td>
                                <td>{{ $tenant->edited_by }}</td>
                                <td>{{ $tenant->created_at }}</td>
                                <td>{{ $tenant->updated_at }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('tenants.edit', $tenant->id) }}">Edit</a>
                                    <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus tenant ini?')">Delete</button>
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
