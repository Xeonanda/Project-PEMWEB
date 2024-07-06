<?php

namespace App\Http\Controllers;

use App\Models\Pengelola;
use App\Models\Pasar;
use Illuminate\Http\Request;
use App\Exports\PengelolaExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class PengelolaController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 10);
        $search = $request->query('search');

        $query = Pengelola::query();

        if (!empty($search)) {
            $query->where('id_user', 'like', '%' . $search . '%')->orWhere('id_pasar', 'like', '%' . $search . '%');
        }

        $pengelola = $query->paginate($perPage);
        return view('pengelola.index', compact('pengelola'));
    }

    public function create()
    {
        $pasars = Pasar::all();
        return view('pengelola.create', compact('pasars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|numeric',
            'id_pasar' => 'required|numeric',
            'created_by' => 'required|string|max:255',
        ]);

        Pengelola::create($request->all());
        return redirect()->route('pengelola.index')
                         ->with('success', 'Pengelola created successfully.');

    }

     /**
     * Display the specified resource.
     */
    public function show(Pengelola $pengelola)
    {
        return view('pengelola.show', compact('pengelola'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengelola $pengelola)
    {
        $pasars = Pasar::all();
        return view('pengelola.edit', compact('pengelola', 'pasars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengelola $pengelola)
    {
        $request->validate([
            'id_user' => 'required|numeric',
            'id_pasar' => 'required|numeric',
            'created_by' => 'required|string|max:255',
        ]);

        $pengelola->update($request->all());
        return redirect()->route('pengelola.index')
                         ->with('success', 'Pengelola updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengelola $pengelola)
    {
        $pengelola->delete();
        return redirect()->route('pengelola.index')
                         ->with('success', 'Pengelola deleted successfully.');
    }

    public function export(Request $request)
    {
        $timestamp = Carbon::now()->format('Y_m_d');
        $fileName = "Pengelola_{$timestamp}.xlsx";
        return Excel::download(new PengelolaExport($request), $fileName);
    }
}
