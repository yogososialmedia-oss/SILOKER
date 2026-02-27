<?php

namespace App\Exports;

use App\Models\Apply;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class ApplyExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize,
    WithStyles
{
    public function collection()
    {
        return Apply::with(['pencariKerja', 'loker.perusahaanMitra'])
            ->latest()
            ->get();
    }

    public function headings(): array
    {
        return [
            'Tanggal Apply',
            'Nama Pelamar',
            'No Telp',
            'Perusahaan',
            'Jabatan',
            'Status',
        ];
    }

    public function map($apply): array
    {
        return [
            Carbon::parse($apply->tanggal_apply)->format('d-m-Y'),
            $apply->pencariKerja->nama_pencari_kerja ?? '-',
            $apply->pencariKerja->no_telp_pencari_kerja ?? '-',
            $apply->loker->perusahaanMitra->nama_perusahaan ?? '-',
            $apply->loker->jabatan ?? '-',
            strtoupper($apply->status),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();

        // 🔹 HEADER STYLE
        $sheet->getStyle('A1:F1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '3f75c7'], // Biru Bootstrap
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ]);

        // 🔹 BORDER SEMUA CELL
        $sheet->getStyle("A1:F{$lastRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        // 🔹 ALIGNMENT KOLOM TERTENTU
        $sheet->getStyle("A2:A{$lastRow}")
            ->getAlignment()->setHorizontal('center');

        $sheet->getStyle("F2:F{$lastRow}")
            ->getAlignment()->setHorizontal('center');

        // 🔹 WARNA STATUS
        for ($row = 2; $row <= $lastRow; $row++) {
            $status = strtolower($sheet->getCell("F{$row}")->getValue());

            $color = match ($status) {
                'pending'   => 'FFC107', // kuning
                'interview' => '0DCAF0', // biru muda
                'diterima'  => '198754', // hijau
                'ditolak'   => 'DC3545', // merah
                default     => '6C757D', // abu
            };

            $sheet->getStyle("F{$row}")->applyFromArray([
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