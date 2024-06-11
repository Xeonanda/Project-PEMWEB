@extends('layouts.app')

@section('title', 'Edit Pengelola')

@section('content')
    <div class="container">
        <h1 class="mt-4">Edit Pengelola</h1>
        <form action="{{ route('pengelola.update', $pengelola->id) }}" method="POST">
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
                <label for="id_user">ID User</label>
                <input type="number" name="id_user" class="form-control" value="{{ $pengelola->id_user }}" required>
            </div>

            <div class="form-group">
                <label for="id_pasar">ID Pasar</label>
                <input type="number" name="id_pasar" class="form-control" value="{{ $pengelola->id_pasar }}" required>
            </div>

            <div class="form-group">
                <label for="created_by">Created By</label>
                <input type="text" name="created_by" class="form-control" value="{{ $pengelola->created_by }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
