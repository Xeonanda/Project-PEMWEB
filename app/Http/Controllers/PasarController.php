<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasar;

class PasarController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 10);
        $search = $request->query('search');

        $query = Pasar::query();

        if (!empty($search)) {
            $query->where('nama', 'like', '%' . $search . '%')->orWhere('alamat', 'like', '%' . $search . '%')->orWhere('kode_pasar', 'like', '%' . $search . '%');
        }

        $pasar = $query->paginate($perPage);
        return view('pasar.index', compact('pasar'));
    }

    public function create()
    {
        return view('pasar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kode_pasar' => 'required|string|max:255',
            'created_by' => 'required|string|max:255',
        ]);

        Pasar::create($request->all());
        return redirect()->route('pasar.index')
                         ->with('success', 'Pasar created successfully.');

    }

     /**
     * Display the specified resource.
     */
    public function show(Pasar $pasar)
    {
        return view('pasar.show', compact('pasar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasar $pasar)
    {
        return view('pasar.edit', compact('pasar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasar $pasar)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kode_pasar' => 'required|string|max:255',
            'created_by' => 'required|string|max:255',
        ]);

        $pasar->update($request->all());
        return redirect()->route('pasar.index')
                         ->with('success', 'Pasar updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasar $pasar)
    {
        $pasar->delete();
        return redirect()->route('pasar.index')
                         ->with('success', 'Pasar deleted successfully.');
    }
}

