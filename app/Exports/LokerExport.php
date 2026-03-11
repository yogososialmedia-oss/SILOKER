<?php

namespace App\Exports;

use App\Models\Loker;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class LokerExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize,
    WithStyles
{
    protected $tahun;
    protected $idPerusahaan;

    public function __construct($tahun = null, $idPerusahaan = null)
    {
        $this->tahun = $tahun;
        $this->idPerusahaan = $idPerusahaan;
    }

    public function collection()
    {
        $query = Loker::with('perusahaanMitra')->latest();

        if ($this->tahun) {
            $query->whereYear('tanggal_mulai_loker', $this->tahun);
        }

        if ($this->idPerusahaan) {
            $query->where('id_perusahaan_mitra', $this->idPerusahaan);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'Nama Perusahaan',
            'Jabatan',
            'Tipe',
            'Status',
            'No.Telp',
            'Email',
        ];
    }

    public function map($loker): array
    {
        $status = now()->between(
            $loker->tanggal_mulai_loker->copy()->startOfDay(),
            $loker->tanggal_berakhir_loker->copy()->endOfDay()
        ) ? 'OPEN' : 'CLOSED';

        return [
            $loker->perusahaanMitra->nama_perusahaan ?? '-',
            $loker->jabatan ?? '-',
            $loker->tipe_loker ?? '-',
            $status,
            $loker->perusahaanMitra->no_telp ?? '-',
            $loker->perusahaanMitra->email_perusahaan ?? '-',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();

        // HEADER
        $sheet->getStyle('A1:F1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '3f75c7'],
            ],
        ]);

        // BORDER
        $sheet->getStyle("A1:F{$lastRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        // WARNA STATUS di kolom D
        for ($row = 2; $row <= $lastRow; $row++) {
            $status = $sheet->getCell("D{$row}")->getValue();

            $color = $status === 'OPEN'
                ? '198754'
                : 'DC3545';

            $sheet->getStyle("D{$row}")->applyFromArray([
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => $color],
                ],
            ]);
        }

        return [];
    }
}