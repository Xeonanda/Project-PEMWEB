@extends('layouts.app')

@section('title', 'Create Pasar')

@section('content')
<div class="container">
    <h1 class="mt-4">Create New Pengelola</h1>
    <div class="card">
        <div class="card-body">
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
                    <select name="id_pasar" class="form-control" required>
                        <option value="">Pilih Pasar</option>
                        @foreach($pasars as $pasar)
                            <option value="{{ $pasar->id }}">{{ $pasar->nama }}</option>
                        @endforeach
                    </select>
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
