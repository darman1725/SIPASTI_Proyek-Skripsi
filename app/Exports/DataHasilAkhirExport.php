<?php

namespace App\Exports;

use App\Models\Management\DataHasilAkhir;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DataHasilAkhirExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $data;
    protected $kodeKriteria;
    protected $kriteria;

    public function __construct($data, $kodeKriteria, $kriteria)
    {
        $this->data = $data;
        $this->kodeKriteria = $kodeKriteria;
        $this->kriteria = $kriteria;
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        $headings = [
            'No',
            'Alternatif',
            'Kegiatan',
        ];

        foreach ($this->kriteria as $key) {
            $headings[] = $key->kode_kriteria;
        }

        $headings[] = 'Total Nilai';
        $headings[] = 'Rangking';

        return $headings;
    }
}
