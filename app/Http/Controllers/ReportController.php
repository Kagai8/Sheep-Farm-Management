<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goat;
use App\Models\GoatProfile;
use App\Models\Breed;
use App\Models\GeneralCost;
use App\Models\Cost;
use App\Models\Sale;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\Builder;
use App\Exports\GoatProfilesExport;
use App\Exports\GeneralCostsExport;
use App\Exports\CostsExport;
use App\Exports\SalesExport;
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

    public function GeneralCostReport(){

    // Retrieve all sheep profiles
        $general_costs = GeneralCost::latest()->get();

        return view('infarmer.reports.report_general',compact('general_costs'));
    }

    public function ExportGeneralCostReport(){

    // Retrieve all sheep profiles
        return Excel::download(new GeneralCostsExport, 'general_costs.xlsx');
    }

    public function CostReport(){

    // Retrieve all sheep profiles
        $costs = Cost::with('goat')->latest()->get();

        return view('infarmer.reports.report_cost',compact('costs'));
    }

    public function ExportCostReport(){

    // Retrieve all sheep profiles
        return Excel::download(new CostsExport, 'costs.xlsx');
    }

    public function SaleReport(){

    // Retrieve all sheep profiles
        $sales = Sale::with('goat')->latest()->get();

        return view('infarmer.reports.report_sale',compact('sales'));
    }

    public function ExportSaleReport(){

    // Retrieve all sheep profiles
        return Excel::download(new SalesExport, 'sales.xlsx');
    }

    
}
