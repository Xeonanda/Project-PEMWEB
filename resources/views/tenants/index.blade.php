@extends('layouts.app')

@section('title', 'Tenants')

@section('content')
    <div class="container">
        <h1 class="mt-4">Tenants</h1>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <a class="btn btn-success mr-2" href="{{ route('tenants.create') }}">Create New Tenant</a>
                        <form action="{{ route('export.tenants') }}" method="GET" class="d-inline">
                            <input type="hidden" name="search" value="{{ request()->query('search') }}">
                            <button type="submit" class="btn btn-primary mr-2">Export to Excel</button>
                        </form>
                    </div>
                    <form action="{{ route('tenants.index') }}" method="GET" class="form-inline">
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
                            <th>Nama</th>
                            <th>ID Pemilik</th>
                            <th>Latitude Tenant</th>
                            <th>Longitude Tenant</th>
                            <th>Harga Iuran</th>
                            <th>ID Pasar</th>
                            <th>Created By</th>
                            <th>Edited By</th>
                            <th>Created At</th>
                            <th>Edited At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tenants as $tenant)
                            <tr>
                                <td>{{ $tenant->id }}</td>
                                <td>{{ $tenant->nama }}</td>
                                <td>{{ $tenant->id_pemilik }}</td>
                                <td>{{ $tenant->latitude_tenant }}</td>
                                <td>{{ $tenant->longitude_tenant }}</td>
                                <td>{{ $tenant->harga_iuran }}</td>
                                <td>{{ $tenant->id_pasar }}</td>
                                <td>{{ $tenant->created_by }}</td>
                                <td>{{ $tenant->edited_by }}</td>
                                <td>{{ $tenant->created_at }}</td>
                                <td>{{ $tenant->updated_at }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('tenants.edit', $tenant->id) }}">Edit</a>
                                    <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus tenant ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <ul class="pagination">
                    @if ($tenants->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $tenants->previousPageUrl() }}">&laquo;</a></li>
                    @endif

                    @php
                        $currentPage = $tenants->currentPage();
                        $lastPage = $tenants->lastPage();
                        $start = max($currentPage - 2, 1);
                        $end = min($currentPage + 2, $lastPage);

                        if ($currentPage <= 3) {
                            $end = min(5, $lastPage);
                        } elseif ($currentPage >= $lastPage - 2) {
                            $start = max($lastPage - 4, 1);
                        }
                    @endphp

                    @if ($start > 1)
                        <li class="page-item"><a class="page-link" href="{{ $tenants->url(1) }}">1</a></li>
                        @if ($start > 2)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                    @endif

                    @foreach(range($start, $end) as $page)
                        <li class="page-item {{ ($currentPage == $page) ? 'active' : '' }}">
                            <a class="page-link" href="{{ $tenants->url($page) }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    @if ($end < $lastPage)
                        @if ($end < $lastPage - 1)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                        <li class="page-item"><a class="page-link" href="{{ $tenants->url($lastPage) }}">{{ $lastPage }}</a></li>
                    @endif

                    @if ($tenants->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $tenants->nextPageUrl() }}">&raquo;</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
