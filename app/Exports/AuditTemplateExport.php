<?php

namespace App\Exports;

use App\Models\Audit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AuditTemplateExport implements FromView, ShouldAutoSize, WithColumnWidths, WithStyles
{


    public function __construct(int $audit)
    {
        $this->audit = $audit;
    }

    public function view(): View
    {
        $audit = Audit::with(['AuditItems' => function ($query) {
        }])->with('dep')->where('id', $this->audit)->first();
        return view('audit.report', [
            'audit' => $audit
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 70,

            'E' => 60,
            'H'=> 70,
            'I'=> 70,
            'J'=> 70,

        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A')->getAlignment()->setWrapText(true);
        $sheet->getStyle('H')->getAlignment()->setWrapText(true);
        $sheet->getStyle('I')->getAlignment()->setWrapText(true);
        $sheet->getStyle('J')->getAlignment()->setWrapText(true);


        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
            // Styling a specific cell by coordinate.
            'A' => ['font' => [ 'bold' => true]],
        ];
    }
}
