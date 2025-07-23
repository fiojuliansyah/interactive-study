<?php

namespace App\Exports;

use App\Models\Prediction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PredictionsExport implements FromCollection, WithHeadings
{
    /**
     * Mendapatkan data untuk diekspor
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Prediction::all();
    }

    /**
     * Menentukan header kolom untuk export
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'User ID',
            'Result',
            'Visual',
            'Auditory',
            'Kinesthetic',
            'Total Correct',
            'Total Wrong',
            'Created At',
            'Updated At',
        ];
    }
}
