@extends('layouts.app')

@section('title', 'Edit Konfigurasi')

@section('content')
    <div class="container">
        <h1 class="mt-4">Edit konfigurasi</h1>
            <div class="card">
                <div class="card-body">
                <form action="{{ route('konfigurasi.update', $konfigurasi->id) }}" method="POST">
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
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $konfigurasi->name}}" required>
                </div>
                <div class="form-group">
                    <label for="value">Value</label>
                    <input type="number" name="value" class="form-control" value="{{ $konfigurasi->value}}" required>
                </div>
                <div class="form-group">
                    <input type="hidden" name="edited_by" class="form-control" value="{{ Auth::user()->name }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
