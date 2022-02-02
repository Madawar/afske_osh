<?php

namespace App\Exports;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class IncidentYearlyExport implements WithMultipleSheets
{
    use Exportable;

    protected $year;

    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];
        $years = range(Carbon::now()->year, 2021);
        foreach ($years as $key => $year) {
            $yearData = with(clone $this->collection)->where('date', '>', Carbon::createFromFormat('Y', $year)->startOfYear()->format('Y-m-d'))->where('date', '<', Carbon::createFromFormat('Y', $year)->endOfYear()->format('Y-m-d'))->get();
            $sheets[] = new IncidentExport($yearData, $year);
        }
        return $sheets;
    }
}
