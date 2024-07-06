<?php

namespace App\Exports;

use App\Models\RiwayatIuran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;

class RiwayatIuranExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = RiwayatIuran::query();

        if (!empty($this->request->query('search'))) {
            $search = $this->request->query('search');
            $query->where('id_tenant', 'like', '%' . $search . '%')->orWhere('tahun_bulan', 'like', '%' . $search . '%')->orWhere('jml_bayar', 'like', '%' . $search . '%')->orWhere('tgl_bayar', 'like', '%' . $search . '%');
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'ID Tenant',
            'Tahun - Bulan',
            'Jumlah Bayar',
            'Tanggal Bayar',
            'Created By',
            'Edited By',
            'Created At',
            'Updated At'
        ];
    }
}
