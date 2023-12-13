<?php

namespace App\Exports;

use App\Models\Transaction;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithBackgroundColor;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class TransactionExport implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize, WithDefaultStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Transaction::select(array_diff(
            Schema::getColumnListing((new Transaction)->getTable()),
            ['id', 'user_id', 'created_at', 'updated_at']
        ))->get();
    }

    public function defaultStyles(Style $defaultStyle)
    {
        // Configure the default styles
        // return $defaultStyle->getFill()->setFillType(Fill::FILL_SOLID);

        // Or return the styles array
        return [
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
        ];
    }

    public function headings(): array
    {
        return [
            ['Tanggal Produksi', 'A1', '', 'A2', '', 'A3', '', 'A4', '', 'A5', ''],
            ['', 'Debit', 'Nominal', 'Debit', 'Nominal', 'Debit', 'Nominal', 'Debit', 'Nominal', 'Debit', 'Nominal']
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->mergeCells('A1:A2');
                $event->sheet->mergeCells('B1:C1');
                $event->sheet->mergeCells('D1:E1');
                $event->sheet->mergeCells('F1:G1');
                $event->sheet->mergeCells('H1:I1');
                $event->sheet->mergeCells('J1:K1');
                $event->sheet->getDelegate()->getStyle('A1:A2')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('CECECE');
            },
        ];
    }

    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class => function (AfterSheet $event) {
    //             $event->sheet->getDelegate()->mergeCells('A1:Q1');
    //             $event->sheet->getDelegate()->getStyle('A2:Q2')
    //                 ->getFill()
    //                 ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    //                 ->getStartColor()
    //                 ->setARGB('CECECE');
    //         },
    //     ];
    // }

    // public static function afterSheet(AfterSheet $event)
    // {

    //     $event->sheet->mergeCells('A1:B1');
    //     $event->sheet->mergeCells('A2:B3');
    //     $event->sheet->mergeCells('A4:B5');
    //     $event->sheet->mergeCells('A6:B7');
    //     $event->sheet->mergeCells('A8:B9');
    //     $event->sheet->mergeCells('A10:B11');
    // }
}
