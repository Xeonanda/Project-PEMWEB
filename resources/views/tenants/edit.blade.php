@extends('layouts.app')

@section('title', 'Edit Tenant')

@section('content')
    <div class="container">
        <h1 class="mt-4">Edit Tenant</h1>
        <form action="{{ route('tenants.update', $tenant->id) }}" method="POST">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $tenant->nama }}" required>
            </div>
            <div class="form-group">
                <label for="id_pemilik">ID Pemilik</label>
                <input type="number" name="id_pemilik" class="form-control" value="{{ $tenant->id_pemilik }}" required>
            </div>
            <div class="form-group">
                <label for="latitude_tenant">Latitude Tenant</label>
                <input type="number" name="latitude_tenant" class="form-control" value="{{ $tenant->latitude_tenant }}" required step="any">
            </div>
            <div class="form-group">
                <label for="longitude_tenant">Longitude Tenant</label>
                <input type="number" name="longitude_tenant" class="form-control" value="{{ $tenant->longitude_tenant }}" required step="any">
            </div>
            <div class="form-group">
                <label for="harga_iuran">Harga Iuran</label>
                <input type="number" name="harga_iuran" class="form-control" value="{{ $tenant->harga_iuran }}" required step="0.01">
            </div>
            <div class="form-group">
                <label for="id_pasar">ID Pasar</label>
                <input type="number" name="id_pasar" class="form-control" value="{{ $tenant->id_pasar }}" required>
            </div>
            <div class="form-group">
                <label for="created_by">Created By</label>
                <input type="text" name="created_by" class="form-control" value="{{ $tenant->created_by }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
