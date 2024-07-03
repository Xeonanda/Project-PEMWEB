@extends('layouts.app')

@section('title', 'Edit Pemilik')

@section('content')
    <div class="container">
        <h1 class="mt-4">Edit Pemilik</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pemilik.update', $pemilik->id) }}" method="POST">
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
                        <label for="nama">Name</label>
                        <input type="text" name="nama" class="form-control" value="{{ $pemilik->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ $pemilik->alamat }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" class="form-control" value="{{ $pemilik->nik }}" required>
                    </div>
                    <div class="form-group">
                        <label for="no_wa">No WA</label>
                        <input type="text" name="no_wa" class="form-control" value="{{ $pemilik->no_wa }}" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="text" name="no_telp" class="form-control" value="{{ $pemilik->no_telp }}" required>
                    </div>
                    <div class="form-group">
                        <label for="created_by">Created By</label>
                        <input type="text" name="created_by" class="form-control" value="{{ $pemilik->created_by }}" required>
                    </div>
                    <div class="form-group">
                        <label for="edited_by">Edited By</label>
                        <input type="text" name="edited_by" class="form-control" value="{{ $pemilik->edited_by }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
