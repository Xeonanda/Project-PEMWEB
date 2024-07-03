@extends('layouts.app')

@section('title', 'Edit Riwayat Pemilikan')

@section('content')
<div class="container">
    <h1 class="mt-4">Edit Riwayat Pemilikan</h1>
        <div class="card">
            <div class="card-body">
            <form action="{{ route('riwayat_pemilikans.update', $riwayatPemilikan->id) }}" method="POST">
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
                <label for="id_tenant">ID Tenant</label>
                <input type="number" name="id_tenant" class="form-control" value="{{ $riwayatPemilikan->id_tenant}}" required>
            </div>
            <div class="form-group">
                <label for="tgl_transaksi">Tanggal Transaksi</label>
                <input type="date" name="tgl_transaksi" class="form-control" value="{{ $riwayatPemilikan->tgl_transaksi}}" required>
            </div>
            <div class="form-group">
                <label for="id_pemilik_lama">ID Pemilik Lama</label>
                <input type="number" name="id_pemilik_lama" class="form-control" value="{{ $riwayatPemilikan->id_pemilik_lama}}" required>
            </div>
            <div class="form-group">
                <label for="id_pemilik_baru">ID Pemilik Baru</label>
                <input type="number" name="id_pemilik_baru" class="form-control" value="{{ $riwayatPemilikan->id_pemilik_baru}}" required>
            </div>
            <div class="form-group">
                <label for="created_by">Created By</label>
                <input type="text" name="created_by" class="form-control" value="{{ $riwayatPemilikan->created_by}}" required>
            </div>
            <div class="form-group">
                <label for="edited_by">Edited By</label>
                <input type="text" name="edited_by" class="form-control" value="{{ $riwayatPemilikan->edited_by}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
@endsection
