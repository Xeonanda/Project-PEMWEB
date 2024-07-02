<?php

namespace App\Http\Controllers;

use App\Models\tenant;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\Pasar;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 10);
        $search = $request->query('search');

        $query = tenant::query();

        if (!empty($search)) {
            $query->where('nama', 'like', '%' . $search . '%')->orWhere('id_pemilik', 'like', '%' . $search . '%')->orWhere('harga_iuran', 'like', '%' . $search . '%')->orWhere('id_pasar', 'like', '%' . $search . '%');
        }

        $tenants = $query->paginate($perPage);
        return view('tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemiliks = Pemilik::all();
        $pasars = Pasar::all();
        return view('tenants.create', compact('pemiliks', 'pasars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'id_pemilik' => 'required|numeric',
            'latitude_tenant' => 'required|numeric|between:-90,90',
            'longitude_tenant' => 'required|numeric|between:-180,180',
            'harga_iuran' => 'required|numeric|min:0',
            'id_pasar' => 'required|numeric',
            'created_by' => 'required|string|max:255',
        ]);

        Tenant::create($request->all());
        return redirect()->route('tenants.index')
                         ->with('success', 'Tenant created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(tenant $tenant)
    {
        return view('tenants.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tenant $tenant)
    {
        $pemiliks = Pemilik::all();
        $pasars = Pasar::all();
        return view('tenants.edit', compact('tenant', 'pemiliks', 'pasars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tenant = Tenant::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'id_pemilik' => 'required|integer',
            'latitude_tenant' => 'required|numeric',
            'longitude_tenant' => 'required|numeric',
            'harga_iuran' => 'required|numeric',
            'id_pasar' => 'required|integer',
            'created_by' => 'required|string|max:255',
            'edited_by' => 'required|string|max:255',
        ]);

        $tenant->update($validatedData);

        return redirect()->route('tenants.index')->with('success', 'Tenant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('tenants.index')
                         ->with('success', 'Tenant deleted successfully.');
    }
}
