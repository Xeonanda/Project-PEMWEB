@extends('layouts.app')

@section('title', 'Riwayat Iuran')

@section('content')
<body>
    <h1 class="mt-4">Riwayat Iuran</h1>
    <a class="btn btn-success mb-3" href="{{ route('riwayat_iuran.create') }}">Create New Riwayat Iuran</a>
    <table class="table table-striped">
        <tr>
            <th>No.</th>
            <th>ID Tenant</th>
            <th>Tahun - Bulan</th>
            <th>Jumlah Bayar</th>
            <th>Tanggal Bayar</th>
            <th>Created By</th>
            <th>Edited By</th>
            <th>Action</th>
        </tr>

        @foreach ($riwayat_iuran as $iuran)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $iuran->id_tenant }}</td>
            <td>{{ $iuran->tahun_bulan }}</td>
            <td>{{ $iuran->jml_bayar }}</td>
            <td>{{ $iuran->tgl_bayar }}</td>
            <td>{{ $iuran->created_by }}</td>
            <td>{{ $iuran->edited_by }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('riwayat_iuran.edit', $iuran->id) }}">Edit</a>
                <form action="{{ route('riwayat_iuran.destroy', $iuran->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus riwayat iuran ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
@endsection
