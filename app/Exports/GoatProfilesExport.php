<?php

namespace App\Exports;
use App\Models\GoatProfile;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;



class GoatProfilesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('infarmer.reports.report_sheep_export', [
            'goat_profiles' => GoatProfile::with('goat', 'breed', 'ram', 'ewe')->latest()->get()
        ]);
    }
}
