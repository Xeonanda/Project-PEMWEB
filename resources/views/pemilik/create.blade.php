@extends('layouts.app')

@section('title', 'Create Pemilik')

@section('content')
    <div class="container">
        <h1 class="mt-4">Create New Pemilik</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pemilik.store') }}" method="POST">
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
                        <label for="nama">Name</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" name="nik" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="no_wa">No WA</label>
                        <input type="number" name="no_wa" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="number" name="no_telp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="created_by" class="form-control" value="{{ Auth::user()->name }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
