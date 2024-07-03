@extends('layouts.app')

@section('title', 'Pengelola')

@section('content')
    <div class="container">
        <h1 class="mt-4">Pengelola</h1>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <a class="btn btn-success mr-2" href="{{ route('pengelola.create') }}">Create New Pengelola</a>
                        <form action="{{ route('export.pengelola') }}" method="GET" class="d-inline">
                            <input type="hidden" name="search" value="{{ request()->query('search') }}">
                            <button type="submit" class="btn btn-primary mr-2">Export to Excel</button>
                        </form>
                    </div>
                    <form action="{{ route('pengelola.index') }}" method="GET" class="form-inline">
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
                            <th>ID User</th>
                            <th>ID Pasar</th>
                            <th>Created By</th>
                            <th>Edited By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengelolas as $pengelola)
                            <tr>
                                <td>{{ $pengelola->id }}</td>
                                <td>{{ $pengelola->id_user }}</td>
                                <td>{{ $pengelola->id_pasar }}</td>
                                <td>{{ $pengelola->created_by }}</td>
                                <td>{{ $pengelola->edited_by }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('pengelola.show', $pengelola->id) }}">Show</a>
                                    <a class="btn btn-secondary btn-sm" href="{{ route('pengelola.edit', $pengelola->id) }}">Edit</a>
                                    <form action="{{ route('pengelola.destroy', $pengelola->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus pengelola ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <ul class="pagination">
                    @if ($pengelolas->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $pengelolas->previousPageUrl() }}">&laquo;</a></li>
                    @endif

                    @php
                        $currentPage = $pengelolas->currentPage();
                        $lastPage = $pengelolas->lastPage();
                        $start = max($currentPage - 2, 1);
                        $end = min($currentPage + 2, $lastPage);

                        if ($currentPage <= 3) {
                            $end = min(5, $lastPage);
                        } elseif ($currentPage >= $lastPage - 2) {
                            $start = max($lastPage - 4, 1);
                        }
                    @endphp

                    @if ($start > 1)
                        <li class="page-item"><a class="page-link" href="{{ $pengelolas->url(1) }}">1</a></li>
                        @if ($start > 2)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                    @endif

                    @foreach(range($start, $end) as $page)
                        <li class="page-item {{ ($currentPage == $page) ? 'active' : '' }}">
                            <a class="page-link" href="{{ $pengelolas->url($page) }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    @if ($end < $lastPage)
                        @if ($end < $lastPage - 1)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                        <li class="page-item"><a class="page-link" href="{{ $pengelolas->url($lastPage) }}">{{ $lastPage }}</a></li>
                    @endif

                    @if ($pengelolas->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $pengelolas->nextPageUrl() }}">&raquo;</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
