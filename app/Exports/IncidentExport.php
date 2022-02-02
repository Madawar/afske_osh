<?php

namespace App\Exports;

use App\Models\Incident;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class IncidentExport  implements FromView, ShouldAutoSize, WithColumnWidths, WithStyles, WithTitle
{
    public $collection;
    public $year;
    public function __construct($collection, $year)
    {
        $this->collection = $collection;
        $this->year = $year;
    }

    public function view(): View
    {
        return view('reports.incident', [
            'incidents' => $this->collection
        ]);
    }

    public function columnWidths(): array
    {
        return [

            'G' => 45,
            'H' => 45,
            'I' => 45,
            'J' => 45,
            'K' => 45,
            'L' => 45,
            'M' => 45,

        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('G')->getAlignment()->setWrapText(true);
        $sheet->getStyle('H')->getAlignment()->setWrapText(true);
        $sheet->getStyle('I')->getAlignment()->setWrapText(true);
        $sheet->getStyle('J')->getAlignment()->setWrapText(true);
        $sheet->getStyle('K')->getAlignment()->setWrapText(true);
        $sheet->getStyle('L')->getAlignment()->setWrapText(true);
        $sheet->getStyle('M')->getAlignment()->setWrapText(true);

        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
            // Styling a specific cell by coordinate.
            'A' => ['font' => ['italic' => true, 'bold' => true]],
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Year ' . $this->year;
    }
}
