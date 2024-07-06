<?php

namespace App\Exports;

use App\Models\tenant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;

class TenantExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = tenant::query();

        if (!empty($this->request->query('search'))) {
            $search = $this->request->query('search');
            $query->where('nama', 'like', '%' . $search . '%')->orWhere('id_pemilik', 'like', '%' . $search . '%')->orWhere('harga_iuran', 'like', '%' . $search . '%')->orWhere('id_pasar', 'like', '%' . $search . '%');
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'ID Pemilik',
            'Latitude Tenant',
            'Longitude Tenant',
            'Harga Iuran',
            'ID Pasar',
            'Created By',
            'Edited By',
            'Created At',
            'Updated At'
        ];
    }
}
