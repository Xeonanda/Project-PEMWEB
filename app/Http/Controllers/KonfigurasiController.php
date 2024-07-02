<?php

namespace App\Http\Controllers;

use App\Models\Konfigurasi;
use Illuminate\Http\Request;

class KonfigurasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 10);
        $search = $request->query('search');

        $query = Konfigurasi::query();

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%')->orWhere('value', 'like', '%' . $search . '%');
        }

        $konfigurasis = $query->paginate($perPage);
        return view('konfigurasi.index', compact('konfigurasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('konfigurasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'value'=> 'required|string|',
            'created_by' => 'required|string|max:255',
        ]);

        Konfigurasi::create($request->all());
        return redirect()->route('konfigurasi.index')
                         ->with('success', 'KOnfigurasi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Konfigurasi $konfigurasi)
    {
        return view('konfigurasi.show', compact('konfigurasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(konfigurasi $konfigurasi)
    {
        return view('konfigurasi.edit', compact('konfigurasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konfigurasi $konfigurasi)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'value'=> 'required|string|',
            'created_by' => 'required|string|max:255',
        ]);

        $konfigurasi->update($request->all());
        return redirect()->route('konfigurasi.index')
                         ->with('success', 'Konfigurasi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konfigurasi $konfigurasi)
    {
        $konfigurasi->delete();
        return redirect()->route('konfigurasi.index')
                         ->with('success', 'Konfigurasi deleted successfully.');
    }
}
