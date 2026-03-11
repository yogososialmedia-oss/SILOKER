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
            'Tanggal Apply',
            'Perusahaan',
            'Jabatan',
            'NIM',
            'Nama Pelamar',
            'No. Telp Pelamar',
            'Email Pelamar',
            'LinkedIn',
            'Status',
        ];
    }

    public function map($apply): array
    {
        return [
            $apply->tanggal_apply ? Carbon::parse($apply->tanggal_apply)->format('d-m-Y') : '-',
            $apply->loker->perusahaanMitra->nama_perusahaan ?? '-',
            $apply->loker->jabatan ?? '-',
            "'" . ($apply->pencariKerja->nim ?? '-'),
            $apply->pencariKerja->nama_pencari_kerja ?? '-',
            "'" . ($apply->pencariKerja->no_telp_pencari_kerja ?? '-'),
            $apply->pencariKerja->email_pencari_kerja ?? '-',
            $apply->linkedin ?? '-',
            strtoupper($apply->status ?? '-'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();

        // HEADER STYLE
        $sheet->getStyle('A1:Q1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '6C757D'],
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ]);

        // BORDER
        $sheet->getStyle("A1:Q{$lastRow}")->applyFromArray([
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

        $sheet->getStyle("I2:I{$lastRow}")
            ->getAlignment()->setHorizontal('center');

        $sheet->getStyle("K2:L{$lastRow}")
            ->getAlignment()->setHorizontal('center');

        $sheet->getStyle("P2:Q{$lastRow}")
            ->getAlignment()->setHorizontal('center');

        // Format text agar angka depan 0 tidak hilang
        $sheet->getStyle("D2:D{$lastRow}")
            ->getNumberFormat()
            ->setFormatCode('@');

        $sheet->getStyle("F2:F{$lastRow}")
            ->getNumberFormat()
            ->setFormatCode('@');

        $sheet->getStyle("M2:M{$lastRow}")
            ->getNumberFormat()
            ->setFormatCode('@');

        // WARNA STATUS di kolom I
        for ($row = 2; $row <= $lastRow; $row++) {
            $status = strtolower(trim($sheet->getCell("I{$row}")->getValue()));

            $color = match ($status) {
                'pending'   => 'FFC107', // kuning
                'interview' => '0DCAF0', // biru muda
                'diterima'  => '198754', // hijau
                'ditolak'   => 'DC3545', // merah
                default     => '6C757D',
            };

            $sheet->getStyle("I{$row}")->applyFromArray([
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => $color],
                ],
                'alignment' => [
                    'horizontal' => 'center',
                    'vertical' => 'center',
                ],
            ]);
        }

        return [];
    }
}