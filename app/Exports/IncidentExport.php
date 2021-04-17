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

class IncidentExport  implements FromView, ShouldAutoSize, WithColumnWidths, WithStyles
{
    public function __construct()
    {
    }

    public function view(): View
    {
        $incidents = Incident::with('department.owner')->orderBy('created_at','DESC')->orderBy('finalized','ASC')->get();
        return view('reports.incident', [
            'incidents' => $incidents
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
}
