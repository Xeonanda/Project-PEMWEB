@extends('layouts.app')

@section('title', 'Tenants')

@section('content')
    <div class="container">
        <h1 class="mt-4">Riwayat Pemilikan</h1>
        <div class="card">
            <div class="card-body">
                <a class="btn btn-success mb-3" href="{{ route('riwayat_pemilikan.create') }}">Create New Riwayat
                    Pemilikan</a>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>ID Tenant</th>
                            <th>Tanggal Transaksi</th>
                            <th>ID Pemilik Lama</th>
                            <th>ID Pemilik Baru</th>
                            <th>Created By</th>
                            <th>Edited By</th>
                            <th>Created At</th>
                            <th>Edited At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat_pemilikans as $riwayatPemilikan)
                            <tr>
                                <td>{{ $riwayatPemilikan->id }}</td>
                                <td>{{ $riwayatPemilikan->id_tenant }}</td>
                                <td>{{ $riwayatPemilikan->tgl_transaksi }}</td>
                                <td>{{ $riwayatPemilikan->id_pemilik_lama }}</td>
                                <td>{{ $riwayatPemilikan->id_pemilik_baru }}</td>
                                <td>{{ $riwayatPemilikan->created_by }}</td>
                                <td>{{ $riwayatPemilikan->edited_by }}</td>
                                <td>{{ $riwayatPemilikan->created_at }}</td>
                                <td>{{ $riwayatPemilikan->updated_at }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('riwayat_pemilikan.edit', $riwayatPemilikan->id) }}">Edit</a>
                                    <form action="{{ route('riwayat_pemilikan.destroy', $riwayatPemilikan->id) }}"method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus riwayat pemilikan ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
