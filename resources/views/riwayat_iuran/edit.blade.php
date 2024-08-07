@extends('layouts.app')

@section('title', 'Edit Riwayat Iuran')

@section('content')
<div class="container">
    <h1 class="mt-4">Edit Riwayat Iuran</h1>
        <div class="card">
            <div class="card-body">
            <form action="{{ route('riwayat_iuran.update', $riwayatIuran->id) }}" method="POST">
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
                <label for="id_tenant">ID Tenant</label>
                <select name="id_tenant" class="form-control" required>
                    <option value="">Pilih Tenant</option>
                    @foreach($tenants as $tenant)
                        <option value="{{ $tenant->id }}" {{ $riwayatIuran->id_tenant == $tenant->id ? 'selected' : '' }}>
                            {{ $tenant->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tahun_bulan">Tahun - Bulan</label>
                <div class="row">
                    <div class="col">
                        <select name="tahun" id="tahun" class="form-control" required>
                            @for ($year = 2015; $year <= 2025; $year++)
                                <option value="{{ $year }}" {{ $year == substr($riwayatIuran->tahun_bulan, 0, 4) ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col">
                        <select name="bulan" id="bulan" class="form-control" required>
                            @php
                                $bulan = substr($riwayatIuran->tahun_bulan, 5, 2);
                            @endphp
                            <option value="01" {{ $bulan == '01' ? 'selected' : '' }}>Januari</option>
                            <option value="02" {{ $bulan == '02' ? 'selected' : '' }}>Februari</option>
                            <option value="03" {{ $bulan == '03' ? 'selected' : '' }}>Maret</option>
                            <option value="04" {{ $bulan == '04' ? 'selected' : '' }}>April</option>
                            <option value="05" {{ $bulan == '05' ? 'selected' : '' }}>Mei</option>
                            <option value="06" {{ $bulan == '06' ? 'selected' : '' }}>Juni</option>
                            <option value="07" {{ $bulan == '07' ? 'selected' : '' }}>Juli</option>
                            <option value="08" {{ $bulan == '08' ? 'selected' : '' }}>Agustus</option>
                            <option value="09" {{ $bulan == '09' ? 'selected' : '' }}>September</option>
                            <option value="10" {{ $bulan == '10' ? 'selected' : '' }}>Oktober</option>
                            <option value="11" {{ $bulan == '11' ? 'selected' : '' }}>November</option>
                            <option value="12" {{ $bulan == '12' ? 'selected' : '' }}>Desember</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="jml_bayar">Jumlah Bayar</label>
                <input type="number" name="jml_bayar" class="form-control" value="{{ $riwayatIuran->jml_bayar }}" required>
            </div>
            <div class="form-group">
                <label for="tgl_bayar">Tanggal Bayar</label>
                <input type="date" name="tgl_bayar" class="form-control" value="{{ $riwayatIuran->tgl_bayar }}" required>
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
