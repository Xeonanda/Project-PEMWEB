<?php

namespace App\Http\Controllers;

use App\Models\riwayat_pemilikan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\tenant;
use App\Models\Pemilik;
use App\Exports\RiwayatPemilikanExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class RiwayatPemilikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 10);
        $search = $request->query('search');

        $query = riwayat_pemilikan::with(['pemilikLama', 'pemilikBaru']);

        if (!empty($search)) {
            $query->where('id_tenant', 'like', '%' . $search . '%')
                ->orWhere('tgl_transaksi', 'like', '%' . $search . '%')
                ->orWhereHas('pemilikLama', function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%');
                })
                ->orWhereHas('pemilikBaru', function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%');
                });
        }

        $riwayat_pemilikans = $query->paginate($perPage);
        return view('riwayat_pemilikan.index', compact('riwayat_pemilikans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemiliks = Pemilik::all();
        $tenants = tenant::all();
        return view('riwayat_pemilikan.create', compact('pemiliks', 'tenants'));
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
        return view('riwayat_pemilikan.show', compact('riwayat_pemilikan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(riwayat_pemilikan $riwayat_pemilikan)
    {
        $pemiliks = Pemilik::all();
        $tenants = tenant::all();
        return view('riwayat_pemilikan.edit', compact('riwayat_pemilikan', 'pemiliks', 'tenants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $riwayatPemilikan = riwayat_pemilikan::findOrFail(($id));
        $validator = Validator::make($request->all(), [
            'id_tenant' => 'required|numeric',
            'tgl_transaksi' => 'required|date_format:Y-m-d',
            'id_pemilik_lama' => 'required|numeric',
            'id_pemilik_baru' => 'required|numeric',
            'edited_by' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $riwayatPemilikan->id_tenant = $request->id_tenant;
        $riwayatPemilikan->tgl_transaksi = $request->tgl_transaksi;
        $riwayatPemilikan->id_pemilik_lama = $request->id_pemilik_lama;
        $riwayatPemilikan->id_pemilik_baru = $request->id_pemilik_baru;
        $riwayatPemilikan->edited_by = $request->edited_by;
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

    public function export(Request $request)
    {
        $timestamp = Carbon::now()->format('Y_m_d');
        $fileName = "RiwayatPemilikan_{$timestamp}.xlsx";
        return Excel::download(new RiwayatPemilikanExport($request), $fileName);
    }
}
