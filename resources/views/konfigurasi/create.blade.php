@extends('layouts.app')

@section('title', 'Create Konfigurasi')

@section('content')
    <div class="container">
        <h1 class="mt-4">Create New Konfigurasi</h1>
        <form action="{{ route('konfigurasis.store') }}" method="POST">
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
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="value">Value</label>
                <input type="number" name="value" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="created_by">Created By</label>
                <input type="text" name="created_by" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>

    </div>
@endsection
