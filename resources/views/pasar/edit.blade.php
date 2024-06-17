@extends('layouts.app')

@section('title', 'Edit Pasar')

@section('content')
    <div class="container">
        <h1 class="mt-4">Edit Pasar</h1>
        <form action="{{ route('pasar.update', $pasar->id) }}" method="POST">
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
                <label for="kode_pasar">Kode Pasar</label>
                <input type="hidden" name="kode_pasar" value="{{ $pasar->kode_pasar }}">
                <p class="form-control-static">{{ $pasar->kode_pasar }}</p>
            </div>
            
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $pasar->nama }}" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $pasar->alamat }}" required>
            </div>

            <div class="form-group">
                <label for="created_by">Created By</label>
                <input type="hidden" name="created_by" value="{{ $pasar->created_by }}">
                <p class="form-control-static">{{ $pasar->created_by }}</p>
            </div>

            <div class="form-group">
                <label for="edited_by">Edited By</label>
                <input type="text" name="edited_by" class="form-control" value="{{ $pasar->edited_by ?? old('edited_by') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
