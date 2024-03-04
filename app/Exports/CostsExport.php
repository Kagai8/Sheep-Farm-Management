<?php

namespace App\Exports;

use App\Models\Cost;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CostsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('infarmer.reports.report_cost_export', [
            'costs' => Cost::with('goat')->latest()->get()
        ]);
    }
}
