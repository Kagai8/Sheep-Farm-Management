<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaccination;
use App\Models\Disease;
use App\Models\Goat;
use App\Models\Sale;
use App\Models\Cost;
use App\Models\GeneralCost;
use Carbon\Carbon;

class DashboardController extends Controller
{
     public function index(){

         // Get the current date
       $currentDate = Carbon::now();

       // Retrieve overdue vaccinations
       $overdueVaccinations = Vaccination::with('goat','disease')->where('due_date', '<', $currentDate)
       ->where('status', 1)
        ->orderBy('due_date', 'desc')
        ->take(5)
        ->get();
        
        $oneWeekFromNow = Carbon::now()->addWeek();

          // Retrieve vaccinations due within one week
          $upcomingVaccinations = Vaccination::with('goat','disease')->whereBetween('due_date', [Carbon::now(), $oneWeekFromNow])
          ->where('status', 1)
              ->orderBy('due_date', 'asc')
              ->take(5)
              ->get();

         $totalAmount = Sale::sum('total_amount');

         $totalGeneralCostAmount = GeneralCost::sum('amount');

         $totalCostAmount = Cost::sum('amount');

         $RecentSales = Sale::latest()->take(3)->get();

        return view('infarmer.index', compact('upcomingVaccinations', 'overdueVaccinations', 'totalAmount','totalGeneralCostAmount','totalCostAmount', 'RecentSales'));
    }
}
