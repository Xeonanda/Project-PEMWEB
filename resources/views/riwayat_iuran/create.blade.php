@extends('layouts.app')

@section('title', 'Create Riwayat Iuran')

@section('content')
<div class="container">
    <h1 class="mt-4">Create New Riwayat Iuran</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('riwayat_iuran.store') }}" method="POST">
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
                    <label for="id_tenant">ID Tenant</label>
                    <select name="id_tenant" class="form-control" required>
                        <option value="">Pilih Tenant</option>
                        @foreach($tenants as $tenant)
                            <option value="{{ $tenant->id }}">{{ $tenant->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tahun_bulan">Tahun - Bulan</label>
                    <div class="row">
                        <div class="col">
                            <select name="tahun" id="tahun" class="form-control" required>
                                @for ($year = 2015; $year <= 2025; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col">
                            <select name="bulan" id="bulan" class="form-control" required>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="jml_bayar">Jumlah Bayar</label>
                    <input type="text" name="jml_bayar" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tgl_bayar">Tanggal Bayar</label>
                    <input type="date" name="tgl_bayar" class="form-control" required>
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
