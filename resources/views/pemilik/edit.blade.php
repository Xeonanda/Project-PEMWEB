@extends('layouts.app')

@section('title', 'Edit Pemilik')

@section('content')
    <div class="container">
        <h1 class="mt-4">Edit Pemilik</h1>
        <form action="{{ route('pemilik.update', $pemilik->id) }}" method="POST">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $pemilik->nama }}" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $pemilik->alamat }}" required>
            </div>
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="number" name="nik" class="form-control" value="{{ $pemilik->nik }}" required step="any">
            </div>
            <div class="form-group">
                <label for="no_wa">No WA</label>
                <input type="number" name="no_wa" class="form-control" value="{{ $pemilik->no_wa }}" required step="any">
            </div>
            <div class="form-group">
                <label for="no_telp">No Telp</label>
                <input type="number" name="no_telp" class="form-control" value="{{ $pemilik->no_telp }}" required step="any">
            </div>
            <div class="form-group">
                <label for="created_by">Created By</label>
                <input type="text" name="created_by" class="form-control" value="{{ $pemilik->created_by }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
