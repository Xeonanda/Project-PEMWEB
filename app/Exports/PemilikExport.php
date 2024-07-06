<?php

namespace App\Exports;

use App\Models\Pemilik;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;

class PemilikExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = Pemilik::query();

        if (!empty($this->request->query('search'))) {
            $search = $this->request->query('search');
            $query->where('nama', 'like', '%' . $search . '%')->orWhere('alamat', 'like', '%' . $search . '%')->orWhere('nik', 'like', '%' . $search . '%')->orWhere('no_wa', 'like', '%' . $search . '%')->orWhere('no_telp', 'like', '%' . $search . '%');
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Alamat',
            'NIK',
            'No Whatsapp',
            'No Telp',
            'Created By',
            'Edited By',
            'Created At',
            'Updated At'
        ];
    }
}
