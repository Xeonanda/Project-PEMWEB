@extends('layouts.app')

@section('title', 'Edit Tenant')

@section('content')
<div class="container">
    <h1 class="mt-4">Edit Tenant</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tenant.update', $tenant->id) }}" method="POST">
                @csrf
                @method('PUT')
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <label for="nama">Name</label>
                    <input type="text" name="nama" class="form-control" value="{{ $tenant->nama}}" required>
                </div>
                <div class="form-group">
                    <label for="id_pemilik">ID Pemilik</label>
                    <input type="number" name="id_pemilik" class="form-control" value="{{ $tenant->id_pemilik}}" required>
                </div>
                <div class="form-group">
                    <label for="latitude_tenant">Latitude Tenant</label>
                    <input type="text" name="latitude_tenant" class="form-control" value="{{ $tenant->latitude_tenant}}" required>
                </div>
                <div class="form-group">
                    <label for="longitude_tenant">Longitude Tenant</label>
                    <input type="text" name="longitude_tenant" class="form-control" value="{{ $tenant->longitude_tenant}}" required>
                </div>
                <div class="form-group">
                    <label for="harga_iuran">Harga Iuran</label>
                    <input type="text" name="harga_iuran" class="form-control" value="{{ $tenant->harga_iuran}}" required>
                </div>
                <div class="form-group">
                    <label for="id_pasar">ID Pasar</label>
                    <input type="number" name="id_pasar" class="form-control" value="{{ $tenant->id_pasar}}" required>
                </div>
                <div class="form-group">
                    <label for="created_by">Created By</label>
                    <input type="text" name="created_by" class="form-control" value="{{ $tenant->created_by}}" required>
                </div>
                <div class="form-group">
                    <label for="edited_by">Edited By</label>
                    <input type="text" name="edited_by" class="form-control" value="{{ $tenant->edited_by}}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
