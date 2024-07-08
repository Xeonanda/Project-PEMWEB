@extends('layouts.app')

@section('title', 'Tenant')

@section('content')
<div class="container">
    <h1 class="mt-4">Detail Tenant</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $tenant->id }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $tenant->nama }}</td>
                </tr>
                <tr>
                    <th>ID Pemilik</th>
                    <td>{{ $tenant->id_pemilik }}</td>
                </tr>
                <tr>
                    <th>Latitude</th>
                    <td>{{ $tenant->latitude_tenant }}</td>
                </tr>
                <tr>
                    <th>Longitude</th>
                    <td>{{ $tenant->longitude_tenant }}</td>
                </tr>
                <tr>
                    <th>Harga Iuran</th>
                    <td>{{ $tenant->harga_iuran }}</td>
                </tr>
                <tr>
                    <th>ID Pasar</th>
                    <td>{{ $tenant->id_pasar }}</td>
                </tr>
                <tr>
                    <th>Created By</th>
                    <td>{{ $tenant->created_by }}</td>
                </tr>
                <tr>
                    <th>Edited By</th>
                    <td>{{ $tenant->edited_by }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $tenant->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $tenant->updated_at }}</td>
                </tr>
            </table>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('tenants.index') }}" class="btn btn-primary">Kembali</a>
                </div>
                <div>
                    <a href='https://www.google.com/maps/search/?api=1&query={{ $tenant->latitude_tenant }},{{ $tenant->longitude_tenant}}' target='_blank' class='btn btn-primary'>Cek Lokasi di Google Maps</a>
                    <a class="btn btn-secondary" href="{{ route('tenants.edit', $tenant->id) }}">Edit</a>
                    <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus tenant ini?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
