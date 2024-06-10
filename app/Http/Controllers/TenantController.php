<?php

namespace App\Http\Controllers;

use App\Models\tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::all();
        return view('tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenants.create');
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
        return view('tenants.edit', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tenant $tenant)
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

        $tenant->update($request->all());
        return redirect()->route('tenants.index')
                         ->with('success', 'Tenant updated successfully.');
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
