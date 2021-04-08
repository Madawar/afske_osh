<?php

namespace App\Exports;

use App\Models\Audit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class AuditTemplateExport implements FromView,ShouldAutoSize
{


    public function __construct(int $audit)
    {
        $this->audit = $audit;
    }

    public function view(): View
    {
        $audit = Audit::with(['AuditItems' => function ($query) {
        }])->where('id', $this->audit)->first();
        return view('audit.report', [
            'audit' => $audit
        ]);
    }

    public function columnWidths(): array
    {
        return [

            'B' => 45,
            'C' => 45,
            'D' => 45,
            'E' => 65,
            'F' => 65,
        ];
    }
}
