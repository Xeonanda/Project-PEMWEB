@extends('layouts.app')

@section('title', 'Riwayat Iuran')

@section('content')
<div class="container">
    <h1 class="mt-4">Detail Riwayat Iuran</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $riwayat_iuran->id }}</td>
                </tr>
                <tr>
                    <th>ID Tenant</th>
                    <td>{{ $riwayat_iuran->id_tenant }}</td>
                </tr>
                <tr>
                    <th>Tahun Bulan</th>
                    <td>{{ $riwayat_iuran->tahun_bulan }}</td>
                </tr>
                <tr>
                    <th>Jumlah Bayar</th>
                    <td>{{ $riwayat_iuran->jml_bayar }}</td>
                </tr>
                <tr>
                    <th>Tanggal Bayar</th>
                    <td>{{ $riwayat_iuran->tgl_bayar }}</td>
                </tr>
                <tr>
                    <th>Created By</th>
                    <td>{{ $riwayat_iuran->created_by }}</td>
                </tr>
                <tr>
                    <th>Edited By</th>
                    <td>{{ $riwayat_iuran->edited_by }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $riwayat_iuran->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $riwayat_iuran->updated_at }}</td>
                </tr>
            </table>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('riwayat_iuran.index') }}" class="btn btn-primary">Kembali</a>
                </div>
                <div>
                    <a class="btn btn-secondary" href="{{ route('riwayat_iuran.edit', $riwayat_iuran->id) }}">Edit</a>
                    <form action="{{ route('riwayat_iuran.destroy', $riwayat_iuran->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus riwayat iuran ini?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
