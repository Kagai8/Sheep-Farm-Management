<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goat;
use App\Models\GeneralCost;
use App\Models\Breed;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\Builder;

class GeneralCostsController extends Controller
{
      public function GeneralCostCreate(){
    
        $goats = Goat::latest()->get();

        $general_costs = GeneralCost::latest()->get();
        

        return view('infarmer.general.general_add',compact('goats', 'general_costs'));
    }


    


    public function GeneralCostStore(Request $request){    

            $general_cost_id = GeneralCost::insertGetId([

            
            'amount' => $request->amount,
            'reason' => $request->reason,
            'date' => $request->date,
            'created_by' => auth()->user()->name,
            
            'created_at' => Carbon::now(),   

                ]);
        

            $notification = array(
                'message' => 'General Cost Inserted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('general.create')->with($notification);

    
}

    public function GeneralCostEdit($id){

        $general_cost = GeneralCost::findOrFail($id);
        $goats = Goat::latest()->get();

        return view('infarmer.general.general_edit',compact('general_cost', 'goats'));

    }

    public function GeneralCostUpdate(Request $request){    

        $general_cost_id = $request->id;

        GeneralCost::findOrFail($general_cost_id)->update([

            'amount' => $request->amount,
            'reason' => $request->reason,
            'date' => $request->date,
            'updated_by' => auth()->user()->name,

            'updated_at' => Carbon::now(),   

            ]);
        $notification = array(
            'message' => 'General Cost Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('general.create')->with($notification);

    }

     public function GeneralCostDelete($id){

        GeneralCost::findOrFail($id)->delete();

        

        $notification = array(
            'message' => 'General Cost Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }// end method 

     public function GeneralCostDetails($id){

        $general_cost = GeneralCost::findOrFail($id);

        return view('infarmer.general.general_details',compact('general_cost'));

    }
}
