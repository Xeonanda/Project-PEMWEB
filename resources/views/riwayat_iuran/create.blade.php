@extends('layouts.app')

@section('title', 'Create Riwayat Iuran')

@section('content')
<div class="container">
    <h1 class="mt-4">Create New Riwayat Iuran</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('riwayat_iuran.store') }}" method="POST">
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
                    <label for="id_tenant">ID Tenant</label>
                    <input type="text" name="id_tenant" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tahun_bulan">Tahun Bulan</label>
                    <input type="text" name="tahun_bulan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="jml_bayar">Jumlah Bayar</label>
                    <input type="text" name="jml_bayar" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tgl_bayar">Tanggal Bayar</label>
                    <input type="date" name="tgl_bayar" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="created_by">Created By</label>
                    <input type="text" name="created_by" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="edited_by">Edited By</label>
                    <input type="text" name="edited_by" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
