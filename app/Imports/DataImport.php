<?php

namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;

class DataImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Data([
            'bulan' => $row[0],
            'ha_block' => $row[1],
            'ffb_produksi_ton' => $row[2],
            'janjang_panen' => $row[3],
            'brondolan_kg' => $row[4],
        ]);
    }
}
