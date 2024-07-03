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
                    <td>{{ $riwayatKepemilikan->id }}</td>
                </tr>
                <tr>
                    <th>ID Tenant</th>
                    <td>{{ $riwayatKepemilikan->id_tenant }}</td>
                </tr>
                <tr>
                    <th>Tanggal Transaksi</th>
                    <td>{{ $riwayatKepemilikan->tgl_transaksi }}</td>
                </tr>
                <tr>
                    <th>ID Pemilik Lama</th>
                    <td>{{ $riwayatKepemilikan->id_pemilik_lama }}</td>
                </tr>
                <tr>
                    <th>ID Pemilik Baru</th>
                    <td>{{ $riwayatKepemilikan->id_pemilik_baru }}</td>
                </tr>
                <tr>
                    <th>Created By</th>
                    <td>{{ $riwayatKepemilikan->created_by }}</td>
                </tr>
                <tr>
                    <th>Edited By</th>
                    <td>{{ $riwayatKepemilikan->edited_by }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $riwayatKepemilikan->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $riwayatKepemilikan->updated_at }}</td>
                </tr>
            </table>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('riwayatKepemilikan.index') }}" class="btn btn-primary">Kembali</a>
                </div>
                <div>
                    <a class="btn btn-secondary" href="{{ route('riwayatKepemilikan.edit', $riwayatKepemilikan->id) }}">Edit</a>
                    <form action="{{ route('riwayatKepemilikan.destroy', $riwayatKepemilikan->id) }}" method="POST" class="d-inline">
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
