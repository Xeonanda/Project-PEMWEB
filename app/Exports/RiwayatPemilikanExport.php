<?php

namespace App\Exports;

use App\Models\riwayat_pemilikan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;

class RiwayatPemilikanExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = riwayat_pemilikan::query();

        if (!empty($this->request->query('search'))) {
            $search = $this->request->query('search');
            $query->where('id_tenant', 'like', '%' . $search . '%')->orWhere('tgl_transaksi', 'like', '%' . $search . '%')->orWhere('id_pemilik_lama', 'like', '%' . $search . '%')->orWhere('id_pemilik_baru', 'like', '%' . $search . '%');
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'ID Tenant',
            'Tanggal Transaksi',
            'ID Pemilik Lama',
            'ID Pemilik Baru',
            'Created By',
            'Edited By',
            'Created At',
            'Updated At'
        ];
    }
}
