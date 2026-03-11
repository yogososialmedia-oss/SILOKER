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
            'Tanggal Daftar',
            'Nama Perusahaan',
            'Email',
            'No Telepon',
            'No NPWP',
            'Provinsi',
            'Kabupaten',
            'Kecamatan',
            'Alamat Perusahaan',
            'Status Akun',
        ];
    }

    public function map($perusahaan): array
    {
        return [
            $perusahaan->created_at ? $perusahaan->created_at->format('d-m-Y') : '-',
            $perusahaan->nama_perusahaan ?? '-',
            $perusahaan->email_perusahaan ?? '-',
            "'" . ($perusahaan->no_telp_perusahaan ?? '-'),
            "'" . ($perusahaan->no_npwp ?? '-'),
            $perusahaan->provinsi ?? '-',
            $perusahaan->kabupaten ?? '-',
            $perusahaan->kecamatan ?? '-',
            $perusahaan->alamat_perusahaan ?? '-',
            str_replace('_', ' ', ucfirst($perusahaan->status_akun ?? '-')),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();

        // Header style
        $sheet->getStyle('A1:L1')->applyFromArray([
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

        // Border
        $sheet->getStyle("A1:L{$lastRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        // Align center
        $sheet->getStyle("A2:A{$lastRow}")
            ->getAlignment()->setHorizontal('center');

        $sheet->getStyle("J2:J{$lastRow}")
            ->getAlignment()->setHorizontal('center');

        $sheet->getStyle("L2:L{$lastRow}")
            ->getAlignment()->setHorizontal('center');

        // Format text untuk no telepon & npwp
        $sheet->getStyle("D2:D{$lastRow}")
            ->getNumberFormat()
            ->setFormatCode('@');

        $sheet->getStyle("E2:E{$lastRow}")
            ->getNumberFormat()
            ->setFormatCode('@');

        // Warna status akun
        for ($row = 2; $row <= $lastRow; $row++) {
            $status = strtolower(trim($sheet->getCell("J{$row}")->getValue()));

            $color = match ($status) {
                'pending' => 'FFC107',               // orange
                'terverifikasi' => '198754',         // hijau
                'verifikasi gagal' => 'DC3545',      // merah
                default => '6C757D'
            };

            $sheet->getStyle("J{$row}")->applyFromArray([
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

        // Warna email verified
        for ($row = 2; $row <= $lastRow; $row++) {
            $verified = strtolower(trim($sheet->getCell("L{$row}")->getValue()));

            $color = match ($verified) {
                'sudah verifikasi' => '198754', // hijau
                'belum verifikasi' => 'DC3545', // merah
                default => '6C757D'
            };

            $sheet->getStyle("L{$row}")->applyFromArray([
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