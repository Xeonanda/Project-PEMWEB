<?php

namespace App\Http\Controllers;

use App\Models\konfigurasi;
use Illuminate\Http\Request;

class KonfigurasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konfigurasis = Konfigurasi::all();
        return view('konfigurasi.index', compact('konfigurasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('konfigurasis.create');
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

        konfigurasi::create($request->all());
        return redirect()->route('konfigurasis.index')
                         ->with('success', 'KOnfigurasi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(konfigurasi $konfigurasi)
    {
        return view('konfigurasis.show', compact('konfigurasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(konfigurasi $konfigurasi)
    {
        return view('konfigurasis.edit', compact('konfigurasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, konfigurasi $konfigurasi)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'value'=> 'required|string|',
            'created_by' => 'required|string|max:255',
        ]);

        $konfigurasi->update($request->all());
        return redirect()->route('konfigurasis.index')
                         ->with('success', 'Konfigurasi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(konfigurasi $konfigurasi)
    {
        $konfigurasi->delete();
        return redirect()->route('konfigurasis.index')
                         ->with('success', 'Konfigurasi deleted successfully.');
    }
}
