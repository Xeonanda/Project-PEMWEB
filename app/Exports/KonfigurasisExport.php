<?php

namespace App\Exports;

use App\Models\Konfigurasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;

class KonfigurasisExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = Konfigurasi::query();

        if (!empty($this->request->query('search'))) {
            $search = $this->request->query('search');
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('value', 'like', '%' . $search . '%');
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Value',
            'Created By',
            'Edited By',
            'Created At',
            'Updated At'
        ];
    }
}
