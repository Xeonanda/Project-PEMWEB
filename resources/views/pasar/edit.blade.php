@extends('layouts.app')

@section('title', 'Edit Pasar')

@section('content')
<div class="container">
    <h1 class="mt-4">Edit Pasar</h1>
        <div class="card">
            <div class="card-body">
            <form action="{{ route('pasar.update', $pasar->id) }}" method="POST">
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
                <input type="text" name="nama" class="form-control" value="{{ $pasar->nama}}" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $pasar->alamat}}" required>
            </div>
            <div class="form-group">
                <label for="kode_pasar">Kode Pasar</label>
                <input type="text" name="kode_pasar" class="form-control" value="{{ $pasar->kode_pasar}}" required>
            </div>
            <div class="form-group">
                <label for="edited_by">Edited By</label>
                <input type="hidden" name="edited_by" class="form-control" value="{{ Auth::user()->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
@endsection
