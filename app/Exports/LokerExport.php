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
            'Tipe Loker',
            'Model Kerja',
            'Minimal Pendidikan',
            'Tanggal Mulai',
            'Tanggal Berakhir',
            'Status',
            'Provinsi',
            'Kabupaten',
            'Kecamatan',
            'Alamat',
            'No. Telepon',
            'Email',
            'Tayangan',
            'Interaksi',
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
            $loker->model_kerja ?? '-',
            $loker->minimal_pendidikan ?? '-',
            $loker->tanggal_mulai_loker ? $loker->tanggal_mulai_loker->format('d-m-Y') : '-',
            $loker->tanggal_berakhir_loker ? $loker->tanggal_berakhir_loker->format('d-m-Y') : '-',
            $status,
            $loker->provinsi ?? '-',
            $loker->kabupaten ?? '-',
            $loker->kecamatan ?? '-',
            $loker->alamat ?? '-',
            "'" . ($loker->no_telp_perusahaan ?? '-'),
            $loker->email_perusahaan ?? '-',
            $loker->tayangan ?? 0,
            $loker->interaksi ?? 0,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();

        // HEADER
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

        // Alignment tengah untuk beberapa kolom
        $sheet->getStyle("F2:H{$lastRow}")
            ->getAlignment()->setHorizontal('center');

        $sheet->getStyle("O2:P{$lastRow}")
            ->getAlignment()->setHorizontal('center');

        // Format no telepon sebagai text
        $sheet->getStyle("M2:M{$lastRow}")
            ->getNumberFormat()
            ->setFormatCode('@');

        // Warna status di kolom H
        for ($row = 2; $row <= $lastRow; $row++) {
            $status = strtoupper(trim($sheet->getCell("H{$row}")->getValue()));

            $color = $status === 'OPEN'
                ? '0D6EFD'   // biru
                : 'DC3545';  // merah

            $sheet->getStyle("H{$row}")->applyFromArray([
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