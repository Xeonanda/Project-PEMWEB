@extends('layouts.app')

@section('title', 'Edit Riwayat Iuran')

@section('content')
<div class="container">
    <h1 class="mt-4">Edit Riwayat Iuran</h1>
        <div class="card">
            <div class="card-body">
            <form action="{{ route('riwayat_iuran.update', $riwayatIuran->id) }}" method="POST">
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
                <input type="text" name="id_tenant" class="form-control" value="{{ $riwayatIuran->id_tenant }}" required>
            </div>
            <div class="form-group">
                <label for="tahun_bulan">Tahun Bulan</label>
                <input type="text" name="tahun_bulan" class="form-control" value="{{ $riwayatIuran->tahun_bulan }}" required>
            </div>
            <div class="form-group">
                <label for="jml_bayar">Jumlah Bayar</label>
                <input type="text" name="jml_bayar" class="form-control" value="{{ $riwayatIuran->jml_bayar }}" required>
            </div>
            <div class="form-group">
                <label for="tgl_bayar">Tanggal Bayar</label>
                <input type="date" name="tgl_bayar" class="form-control" value="{{ $riwayatIuran->tgl_bayar }}" required>
            </div>
            <div class="form-group">
                <label for="created_by">Created By</label>
                <input type="text" name="created_by" class="form-control" value="{{ $riwayatIuran->created_by }}" required>
            </div>
            <div class="form-group">
                <label for="edited_by">Edited By</label>
                <input type="text" name="edited_by" class="form-control" value="{{ $riwayatIuran->edited_by }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
@endsection
