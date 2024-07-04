@extends('layouts.app')

@section('title', 'Create Tenant')

@section('content')
<div class="container">
    <h1 class="mt-4">Create New Tenant</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tenant.store') }}" method="POST">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="id_pemilik">ID Pemilik</label>
                    <input type="number" name="id_pemilik" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="latitude_tenant">Latitude Tenant</label>
                    <input type="text" name="latitude_tenant" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="longitude_tenant">Longitude Tenant</label>
                    <input type="text" name="longitude_tenant" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="harga_iuran">Harga Iuran</label>
                    <input type="text" name="harga_iuran" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="id_pasar">ID Pasar</label>
                    <input type="number" name="id_pasar" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="created_by">Created By</label>
                    <input type="text" name="created_by" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
