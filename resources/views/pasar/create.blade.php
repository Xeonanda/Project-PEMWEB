@extends('layouts.app')

@section('title', 'Create Pasar')

@section('content')
<div class="container">
    <h1 class="mt-4">Create New Pasar</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pasar.store') }}" method="POST">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="kode_pasar">Kode Pasar</label>
                    <input type="text" name="kode_pasar" class="form-control" required>
                </div>
                <div class="form-group">
                    
                    <input type="hidden" name="created_by" class="form-control" value="{{ Auth::user()->name }}">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
