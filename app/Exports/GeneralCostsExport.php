<?php

namespace App\Exports;
use App\Models\GeneralCost;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class GeneralCostsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('infarmer.reports.report_general_export', [
            'general_costs' => GeneralCost::latest()->get()
        ]);
    }
}
