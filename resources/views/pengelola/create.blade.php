@extends('layouts.app')

@section('title', 'Create Pengelola')

@section('content')
    <div class="container">
        <h1 class="mt-4">Create New Pengelola</h1>
        <form action="{{ route('pengelola.store') }}" method="POST">
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
                <label for="id_user">ID User</label>
                <input type="number" name="id_user" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="id_pasar">ID Pasar</label>
                <input type="number" name="id_pasar" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="created_by">Created By</label>
                <input type="text" name="created_by" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>

    </div>
@endsection
