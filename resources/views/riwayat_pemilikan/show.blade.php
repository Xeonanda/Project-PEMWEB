@extends('layouts.app')

@section('title', 'Riwayat Kepemilikan')

@section('content')
<div class="container">
    <h1 class="mt-4">Detail Riwayat Kepemilikan</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $riwayat_pemilikan->id }}</td>
                </tr>
                <tr>
                    <th>ID Tenant</th>
                    <td>{{ $riwayat_pemilikan->id_tenant }}</td>
                </tr>
                <tr>
                    <th>Tanggal Transaksi</th>
                    <td>{{ $riwayat_pemilikan->tgl_transaksi }}</td>
                </tr>
                <tr>
                    <th>ID Pemilik Lama</th>
                    <td>{{ $riwayat_pemilikan->id_pemilik_lama }}</td>
                </tr>
                <tr>
                    <th>ID Pemilik Baru</th>
                    <td>{{ $riwayat_pemilikan->id_pemilik_baru }}</td>
                </tr>
                <tr>
                    <th>Created By</th>
                    <td>{{ $riwayat_pemilikan->created_by }}</td>
                </tr>
                <tr>
                    <th>Edited By</th>
                    <td>{{ $riwayat_pemilikan->edited_by }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $riwayat_pemilikan->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $riwayat_pemilikan->updated_at }}</td>
                </tr>
            </table>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('riwayat_pemilikan.index') }}" class="btn btn-primary">Kembali</a>
                </div>
                <div>
                    <a class="btn btn-secondary" href="{{ route('riwayat_pemilikan.edit', $riwayat_pemilikan->id) }}">Edit</a>
                    <form action="{{ route('riwayat_pemilikan.destroy', $riwayat_pemilikan->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus riwayat kepemilikan ini?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
