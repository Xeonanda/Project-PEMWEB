@extends('layouts.app')

@section('title', 'Create Riwayat Pemilikan')

@section('content')
<div class="container">
    <h1 class="mt-4">Create New Riwayat Pemilikan</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('riwayat_pemilikan.store') }}" method="POST">
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
                    <select name="id_tenant" class="form-control" required>
                        <option value="">Pilih Tenant</option>
                        @foreach($tenants as $tenant)
                            <option value="{{ $tenant->id }}">{{ $tenant->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tgl_transaksi">Tanggal Transaksi</label>
                    <input type="date" name="tgl_transaksi" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="id_pemilik_lama">ID Pemilik Lama</label>
                    <select name="id_pemilik_lama" class="form-control" required>
                        <option value="">Pilih Pemilik</option>
                        @foreach($pemiliks as $pemilik)
                            <option value="{{ $pemilik->id }}">{{ $pemilik->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_pemilik_baru">ID Pemilik Baru</label>
                    <select name="id_pemilik_baru" class="form-control" required>
                        <option value="">Pilih Pemilik</option>
                        @foreach($pemiliks as $pemilik)
                            <option value="{{ $pemilik->id }}">{{ $pemilik->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" name="created_by" class="form-control" value="{{ Auth::user()->name }}">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
