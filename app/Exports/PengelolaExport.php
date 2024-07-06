<?php

namespace App\Exports;

use App\Models\Pengelola;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;

class PengelolaExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = Pengelola::query();

        if (!empty($this->request->query('search'))) {
            $search = $this->request->query('search');
            $query->where('id_user', 'like', '%' . $search . '%')->orWhere('id_pasar', 'like', '%' . $search . '%');
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'ID User',
            'ID Pasar',
            'Created By',
            'Edited By',
            'Created At',
            'Updated At'
        ];
    }
}
