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
    protected $id_loker;
    protected $tahun;
    protected $id_perusahaan;

    public function __construct($id_loker = null, $tahun = null, $id_perusahaan = null)
    {
        $this->id_loker = $id_loker;
        $this->tahun = $tahun;
        $this->id_perusahaan = $id_perusahaan;
    }

    public function collection()
    {
        $query = Apply::with(['pencariKerja', 'loker.perusahaanMitra'])->latest();

        if ($this->id_loker) {
            $query->where('id_loker', $this->id_loker);
        }

        if ($this->tahun) {
            $query->whereYear('tanggal_apply', $this->tahun);
        }

        if ($this->id_perusahaan) {
            $query->whereHas('loker', function ($q) {
                $q->where('id_perusahaan_mitra', $this->id_perusahaan);
            });
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Perusahaan',
            'Jabatan',
            'NIM',
            'Nama',
            'No. Telp',
            'Email',
            'Status',
        ];
    }

    public function map($apply): array
    {
        return [
            $apply->tanggal_apply ? Carbon::parse($apply->tanggal_apply)->format('d-m-Y') : '-',
            $apply->loker->perusahaanMitra->nama_perusahaan ?? '-',
            $apply->loker->jabatan ?? '-',
            $apply->pencariKerja->nim ?? '-',
            $apply->pencariKerja->nama_pencari_kerja ?? '-',
            $apply->pencariKerja->no_telp_pencari_kerja ?? '-',
            $apply->pencariKerja->email ?? '-',
            strtoupper($apply->status ?? '-'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();

        // HEADER STYLE
        $sheet->getStyle('A1:H1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '3f75c7'],
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ]);

        // BORDER
        $sheet->getStyle("A1:H{$lastRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        // ALIGN
        $sheet->getStyle("A2:A{$lastRow}")
            ->getAlignment()->setHorizontal('center');

        $sheet->getStyle("D2:D{$lastRow}")
            ->getAlignment()->setHorizontal('center');

        $sheet->getStyle("H2:H{$lastRow}")
            ->getAlignment()->setHorizontal('center');

        // WARNA STATUS di kolom H
        for ($row = 2; $row <= $lastRow; $row++) {
            $status = strtolower($sheet->getCell("H{$row}")->getValue());

            $color = match ($status) {
                'pending'   => 'FFC107',
                'interview' => '0DCAF0',
                'diterima'  => '198754',
                'ditolak'   => 'DC3545',
                default     => '6C757D',
            };

            $sheet->getStyle("H{$row}")->applyFromArray([
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