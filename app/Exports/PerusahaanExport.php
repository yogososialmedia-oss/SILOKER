<?php

namespace App\Exports;

use App\Models\PerusahaanMitra;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class PerusahaanExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize,
    WithStyles
{
    protected $tahun;

    public function __construct($tahun = null)
    {
        $this->tahun = $tahun;
    }

    public function collection()
    {
        $query = PerusahaanMitra::latest();

        if ($this->tahun) {
            $query->whereYear('created_at', $this->tahun);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Nama Perusahaan',
            'Email',
            'No NPWP',
            'Status',
        ];
    }

    public function map($perusahaan): array
    {
        return [
            $perusahaan->created_at ? $perusahaan->created_at->format('d-m-Y') : '-',
            $perusahaan->nama_perusahaan ?? '-',
            $perusahaan->email_perusahaan ?? '-',
            "'" . ($perusahaan->no_npwp ?? '-'),
            ucfirst($perusahaan->status_akun ?? '-'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();

        // Header style
        $sheet->getStyle('A1:E1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '198754'],
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ]);

        // Border
        $sheet->getStyle("A1:E{$lastRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        // Align tanggal & status
        $sheet->getStyle("A2:A{$lastRow}")
            ->getAlignment()->setHorizontal('center');

        $sheet->getStyle("E2:E{$lastRow}")
            ->getAlignment()->setHorizontal('center');

        $sheet->getStyle("D2:D{$lastRow}")
            ->getNumberFormat()
            ->setFormatCode('@');

        // WARNA STATUS
        for ($row = 2; $row <= $lastRow; $row++) {

            $status = strtolower($sheet->getCell("E{$row}")->getValue());

            $color = match ($status) {
                'pending' => 'FFC107',             // orange
                'terverifikasi' => '0D6EFD',       // biru
                'verifikasi gagal' => 'DC3545',    // merah
                default => '6C757D'
            };

            $sheet->getStyle("E{$row}")->applyFromArray([
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