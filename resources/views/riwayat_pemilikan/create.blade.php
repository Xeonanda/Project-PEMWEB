@extends('layouts.app')

@section('title', 'Create Riwayat Pemilikan')

@section('content')
    <div class="container">
        <h1 class="mt-4">Create New Riwayat Pemilikan</h1>
        <form action="{{ route('riwayat_pemilikan.store') }}" method="POST">
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
            <div class="form-group">
                <label for="id_tenant">ID Tenant</label>
                <input type="number" name="id_tenant" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tgl_transaksi">Tanggal Transaksi</label>
                <input type="date" name="tgl_transaksi" class="form-control" value="{{ old('tgl_transaksi') }}" required>
            </div>
            <div class="form-group">
                <label for="id_pemilik_lama">ID Pemilik Lama</label>
                <input type="number" name="id_pemilik_lama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="id_pemilik_baru">ID Pemilik Baru</label>
                <input type="number" name="id_pemilik_baru" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="created_by">Created By</label>
                <input type="text" name="created_by" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>

    </div>
@endsection
