@extends('layouts.app')

@section('title', 'Create Pemilik')

@section('content')
    <div class="container">
        <h1 class="mt-4">Create New Pemilik</h1>
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
                    <input type="text" name="name" class="form-control" value="{{ $pemilik->name}}" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="created_by">Created By</label>
                    <input type="text" name="created_by" class="form-control" value="{{ $pemilik->created_by}}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
