<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goat;
use App\Models\Cost;
use App\Models\Breed;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\Builder;

class CostsController extends Controller
{
     public function CostCreate(){
    
        $goats = Goat::latest()->get();

        $costs = Cost::with('goat')->latest()->get();
        

        return view('infarmer.cost.cost_add',compact('goats', 'costs'));
    }


    


    public function CostStore(Request $request){    

            $cost_id = Cost::insertGetId([

            'goat_id' => $request->goat_id,
            'amount' => $request->amount,
            'description' => $request->description,
            'date' => $request->date,
            'created_by' => auth()->user()->name,
            
            'created_at' => Carbon::now(),   

                ]);
        

            $notification = array(
                'message' => 'Cost Inserted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('cost.create')->with($notification);

    
}

    public function CostEdit($id){

        $cost = Cost::with('goat')->findOrFail($id);
        $goats = Goat::latest()->get();

        return view('infarmer.cost.cost_edit',compact('cost', 'goats'));

    }

    public function CostUpdate(Request $request){    

        $cost_id = $request->id;

        Cost::findOrFail($cost_id)->update([

            'goat_id' => $request->goat_id,
            'amount' => $request->amount,
            'description' => $request->description,
            'date' => $request->date,
            'updated_by' => auth()->user()->name,

            'updated_at' => Carbon::now(),   

            ]);
        $notification = array(
            'message' => 'Cost Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('cost.create')->with($notification);

    }

     public function CostDelete($id){

        Cost::findOrFail($id)->delete();

        

        $notification = array(
            'message' => 'Cost Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }// end method 

     public function CostDetails($id){

        $cost = Cost::with('goat')->findOrFail($id);

        return view('infarmer.cost.cost_details',compact('cost'));

    }
}
