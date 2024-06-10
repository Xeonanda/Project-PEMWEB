<?php

namespace App\Http\Controllers;

use App\Models\riwayat_pemilikan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RiwayatPemilikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riwayat_pemilikans = Riwayat_pemilikan::all();
        return view('riwayat_pemilikan.index', compact('riwayat_pemilikans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('riwayat_pemilikan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'id_tenant' => 'required|numeric',
        'tgl_transaksi' => 'required|date_format:Y-m-d',
        'id_pemilik_lama' => 'required|numeric',
        'id_pemilik_baru' => 'required|numeric',
        'created_by' => 'required|string|max:255'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $riwayatPemilikan = new riwayat_pemilikan();
    $riwayatPemilikan->id_tenant = $request->id_tenant;
    $riwayatPemilikan->tgl_transaksi = $request->tgl_transaksi;
    $riwayatPemilikan->id_pemilik_lama = $request->id_pemilik_lama;
    $riwayatPemilikan->id_pemilik_baru = $request->id_pemilik_baru;
    $riwayatPemilikan->created_by = $request->created_by;
    $riwayatPemilikan->save();

    return redirect()->route('riwayat_pemilikan.index')->with('success', 'Riwayat Pemilikan created successfully');
}
    /**
     * Display the specified resource.
     */
    public function show(riwayat_pemilikan $riwayat_pemilikan)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(riwayat_pemilikan $riwayat_pemilikan)
    {
        return view('riwayat_pemilikan.edit', compact('riwayat_pemilikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'id_tenant' => 'required|numeric',
        'tgl_transaksi' => 'required|date_format:Y-m-d',
        'id_pemilik_lama' => 'required|numeric',
        'id_pemilik_baru' => 'required|numeric',
        'created_by' => 'required|string|max:255'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $riwayatPemilikan = riwayat_pemilikan::findOrFail($id);
    $riwayatPemilikan->id_tenant = $request->id_tenant;
    $riwayatPemilikan->tgl_transaksi = $request->tgl_transaksi;
    $riwayatPemilikan->id_pemilik_lama = $request->id_pemilik_lama;
    $riwayatPemilikan->id_pemilik_baru = $request->id_pemilik_baru;
    $riwayatPemilikan->created_by = $request->created_by;
    $riwayatPemilikan->save();

    return redirect()->route('riwayat_pemilikan.index')->with('success', 'Riwayat Pemilikan updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(riwayat_pemilikan $riwayat_pemilikan)
    {
        $riwayat_pemilikan->delete();
        return redirect()->route('riwayat_pemilikan.index')->with('success', 'Riwayat Pemilikan deleted successfully');
    }
}
