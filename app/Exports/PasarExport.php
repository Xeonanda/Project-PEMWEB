<?php

namespace App\Exports;

use App\Models\Pasar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Http\Request;

class PasarsExport implements FromCollection
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = Pasar::query();

        if (!empty($this->request->query('search'))) {
            $search = $this->request->query('search');
            $query->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('alamat', 'like', '%' . $search . '%')
                  ->orWhere('kode_pasar', 'like', '%' . $search . '%');
        }

        return $query->get();
    }
}
