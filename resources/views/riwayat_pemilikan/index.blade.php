@extends('layouts.app')

@section('title', 'Tenants')

@section('content')
    <div class="container">
        <h1 class="mt-4">Riwayat Pemilikan</h1>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a class="btn btn-success mb-3" href="{{ route('riwayat_pemilikan.create') }}">Create New Riwayat Pemilikan</a>
                    <form action="{{ route('riwayat_pemilikan.index') }}" method="GET" class="form-inline">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request()->get('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
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
                <ul class="pagination">
                    @if ($riwayat_pemilikans->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $riwayat_pemilikans->previousPageUrl() }}">&laquo;</a></li>
                    @endif

                    @php
                        $currentPage = $riwayat_pemilikans->currentPage();
                        $lastPage = $riwayat_pemilikans->lastPage();
                        $start = max($currentPage - 2, 1);
                        $end = min($currentPage + 2, $lastPage);

                        if ($currentPage <= 3) {
                            $end = min(5, $lastPage);
                        } elseif ($currentPage >= $lastPage - 2) {
                            $start = max($lastPage - 4, 1);
                        }
                    @endphp

                    @if ($start > 1)
                        <li class="page-item"><a class="page-link" href="{{ $riwayat_pemilikans->url(1) }}">1</a></li>
                        @if ($start > 2)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                    @endif

                    @foreach(range($start, $end) as $page)
                        <li class="page-item {{ ($currentPage == $page) ? 'active' : '' }}">
                            <a class="page-link" href="{{ $riwayat_pemilikans->url($page) }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    @if ($end < $lastPage)
                        @if ($end < $lastPage - 1)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                        <li class="page-item"><a class="page-link" href="{{ $riwayat_pemilikans->url($lastPage) }}">{{ $lastPage }}</a></li>
                    @endif

                    @if ($riwayat_pemilikans->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $riwayat_pemilikans->nextPageUrl() }}">&raquo;</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
