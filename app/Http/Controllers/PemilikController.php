<?php

namespace App\Http\Controllers;

use App\Models\Pemilik;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemilik = Pemilik::all();
        return view('pemilik.index', compact('pemilik'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemilik.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required',
            'nik' => 'required|numeric',
            'no_wa' => 'required|numeric',
            'no_telp' => 'required|numeric',
            'created_by' => 'required|string',
        ]);

        Pemilik::create($request->all());
        return redirect()->route('pemilik.index')
                         ->with('success', 'Tenant created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemilik $pemilik)
    {
        return view('pemilik.show', compact('pemilik'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemilik $pemilik)
    {
        return view('pemilik.edit', compact('pemilik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemilik $pemilik)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required',
            'nik' => 'required|numeric',
            'no_wa' => 'required|numeric',
            'no_telp' => 'required|numeric',
            'created_by' => 'required|string',
        ]);

        $pemilik->update($request->all());
        return redirect()->route('pemilik.index')
                         ->with('success', 'Pemilik updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemilik $pemilik)
    {
        $pemilik->delete();
        return redirect()->route('pemilik.index')
                         ->with('success', 'Pemilik deleted successfully.');
    }
}
