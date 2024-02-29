<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goat;
use App\Models\GoatProfile;
use App\Models\Breed;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\Builder;
use App\Exports\GoatProfilesExport;
use Maatwebsite\Excel\Facades\Excel;


class ReportController extends Controller
{
    public function GoatFullReport(){

    // Retrieve all sheep profiles
        $goat_profiles = GoatProfile::with('goat', 'breed','ram', 'ewe')->latest()->get();

        return view('infarmer.reports.report_sheep',compact('goat_profiles'));
    }

    public function ExportGoatFullReport(){

    // Retrieve all sheep profiles
        return Excel::download(new GoatProfilesExport, 'goat_profiles.xlsx');
    }

    public function GoatRamReport(){

        // Retrieve ram profiles
        $rams = GoatProfile::with('goat', 'breed')
            ->whereHas('goat', function (Builder $query) {
                $query->where('goat_gender', 'Ram');
            })
            ->latest()
            ->get();

        return view('infarmer.reports.report_ram',compact('rams'));
    }

    public function GoatEweReport(){

        // Retrieve ram profiles
            $rams = GoatProfile::with('goat', 'breed','ram', 'ewe')
                ->whereHas('goat', function (Builder $query) {
                    $query->where('goat_gender', 'Ram');
                })
                ->latest()
                ->get();

        return view('infarmer.reports.report_ram',compact('rams'));
    }
}
