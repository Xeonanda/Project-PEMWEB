<?php

namespace App\Http\Controllers;

use App\Models\RiwayatIuran;
use App\Models\tenant;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Exports\RiwayatIuranExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class RiwayatIuranController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 10);
        $search = $request->query('search');

        $query = RiwayatIuran::with('tenant');

        if (!empty($search)) {
            $query->where('id_tenant', 'like', '%' . $search . '%')
                ->orWhere('tahun_bulan', 'like', '%' . $search . '%')
                ->orWhere('jml_bayar', 'like', '%' . $search . '%')
                ->orWhere('tgl_bayar', 'like', '%' . $search . '%')
                ->orWhereHas('tenant', function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%');
                });
        }

        $riwayat_iuran = $query->paginate($perPage);
        return view('riwayat_iuran.index', compact('riwayat_iuran'));
    }

    public function create()
    {
        $tenants = tenant::all();
        return view('riwayat_iuran.create', compact('tenants'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_tenant' => 'required|numeric',
            'tahun' => 'required|numeric',
            'bulan' => 'required|string',
            'jml_bayar' => 'required|numeric',
            'tgl_bayar' => 'required|date_format:Y-m-d',
            'created_by' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tahunBulan = $request->tahun . '-' . $request->bulan;

        $riwayatIuran = new RiwayatIuran();
        $riwayatIuran->id_tenant = $request->id_tenant;
        $riwayatIuran->tahun_bulan = $tahunBulan;
        $riwayatIuran->jml_bayar = $request->jml_bayar;
        $riwayatIuran->tgl_bayar = $request->tgl_bayar;
        $riwayatIuran->created_by = $request->created_by;
        $riwayatIuran->save();

        return redirect()->route('riwayat_iuran.index')->with('success', 'Riwayat Iuran created successfully');
    }


    public function show(RiwayatIuran $riwayat_iuran)
    {
        return view('riwayat_iuran.show', compact('riwayat_iuran'));
    }

    public function edit(RiwayatIuran $riwayatIuran)
    {
        $tenants = tenant::all();
        return view('riwayat_iuran.edit', compact('riwayatIuran', 'tenants'));
    }

    public function update(Request $request, RiwayatIuran $riwayatIuran)
    {
        $validator = Validator::make($request->all(), [
            'id_tenant' => 'required|numeric',
            'tahun' => 'required|numeric',
            'bulan' => 'required|string',
            'jml_bayar' => 'required|numeric',
            'tgl_bayar' => 'required|date_format:Y-m-d',
            'edited_by' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tahunBulan = $request->tahun . '-' . $request->bulan;

        $riwayatIuran->id_tenant = $request->id_tenant;
        $riwayatIuran->tahun_bulan = $tahunBulan;
        $riwayatIuran->jml_bayar = $request->jml_bayar;
        $riwayatIuran->tgl_bayar = $request->tgl_bayar;
        $riwayatIuran->edited_by = $request->edited_by;
        $riwayatIuran->save();

        return redirect()->route('riwayat_iuran.index')->with('success', 'Riwayat Iuran updated successfully');
    }

    public function destroy(RiwayatIuran $riwayatIuran)
    {
        $riwayatIuran->delete();
        return redirect()->route('riwayat_iuran.index')->with('success', 'Riwayat Iuran deleted successfully');
    }

    public function export(Request $request)
    {
        $timestamp = Carbon::now()->format('Y_m_d');
        $fileName = "RiwayatIuran_{$timestamp}.xlsx";
        return Excel::download(new RiwayatIuranExport($request), $fileName);
    }
}
