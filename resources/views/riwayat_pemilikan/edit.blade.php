@extends('layouts.app')

@section('title', 'Edit Riwayat Pemilikan')

@section('content')
    <div class="container">
        <h1 class="mt-4">Edit Riwayat Pemilikan</h1>
        <form action="{{ route('riwayat_pemilikan.update', $riwayat_pemilikan->id) }}" method="POST">
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
                <select name="id_tenant" class="form-control" required>
                    <option value="">Pilih Tenant</option>
                    @foreach($tenants as $tenant)
                        <option value="{{ $tenant->id }}" {{ $riwayat_pemilikan->id_tenant == $tenant->id ? 'selected' : '' }}>
                            {{ $tenant->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tgl_transaksi">Tanggal Transaksi</label>
                <input type="date" name="tgl_transaksi" class="form-control" value="{{ isset($riwayat_pemilikan) ? $riwayat_pemilikan->tgl_transaksi : old('tgl_transaksi') }}" required>
            </div>
            <div class="form-group">
                <label for="id_pemilik_lama">ID Pemilik Lama</label>
                <select name="id_pemilik_lama" class="form-control" required>
                    <option value="">Pilih Pemilik</option>
                    @foreach($pemiliks as $pemilik)
                        <option value="{{ $pemilik->id }}" {{ $riwayat_pemilikan->id_pemilik_lama == $pemilik->id ? 'selected' : '' }}>
                            {{ $pemilik->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_pemilik_baru">ID Pemilik Baru</label>
                <select name="id_pemilik_baru" class="form-control" required>
                    <option value="">Pilih Pemilik</option>
                    @foreach($pemiliks as $pemilik)
                        <option value="{{ $pemilik->id }}" {{ $riwayat_pemilikan->id_pemilik_baru == $pemilik->id ? 'selected' : '' }}>
                            {{ $pemilik->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="created_by">Created By</label>
                <input type="text" name="created_by" class="form-control" value="{{ $riwayat_pemilikan->created_by }}" required>
            </div>
            <div class="form-group">
                <label for="edited_by">Edited By</label>
                <input type="text" name="edited_by" class="form-control" value="{{ $riwayat_pemilikan->edited_by ?? old('edited_by') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
