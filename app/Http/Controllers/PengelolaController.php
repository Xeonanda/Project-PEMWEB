<?php

namespace App\Http\Controllers;

use App\Models\Pengelola;
use Illuminate\Http\Request;

class PengelolaController extends Controller
{
    public function index()
    {
        $pengelola = Pengelola::all();
        return view('pengelola.index', compact('pengelola'));
    }

    public function create()
    {
        return view('pengelola.create');
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
        return view('pengelola.edit', compact('pengelola'));
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
}
