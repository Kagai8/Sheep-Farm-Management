<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaccination;
use App\Models\Disease;
use App\Models\Goat;
use Carbon\Carbon;


class VaccinationsController extends Controller
{
    public function VaccinationCreate(){

        $diseases = Disease::latest()->get();
        $vaccinations = Vaccination::with('goat','disease')->latest()->get();
        $goats = Goat::latest()->get();
        
        return view('infarmer.vaccination.vaccination_add', compact('vaccinations','diseases', 'goats'));
    }


    


    public function VaccinationStore(Request $request){    


        $vaccination_id = Vaccination::insertGetId([

            'goat_id' => $request->goat_id,
            'disease_id' => $request->disease_id,
            'vaccinator' => $request->vaccinator,
            'due_date' => $request->due_date,
            
            'notes' => $request->notes,
            'status' => 1,
            'created_by' => auth()->user()->name,

            'created_at' => Carbon::now(),   

            ]);
        $notification = array(
            'message' => 'Vaccination Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('vaccination.create')->with($notification);

    }

    public function VaccinationUpdate(Request $request){    

        $vaccination_id = $request->id;

        Vaccination::findOrFail($vaccination_id)->update([

            'goat_id' => $request->goat_id,
            'disease_id' => $request->disease_id,
            'vaccinator' => $request->vaccinator,
            'due_date' => $request->due_date,
            'actual_date' => $request->actual_date,
            'notes' => $request->notes,
            
            
        
            'updated_by' => auth()->user()->name,
            'updated_at' => Carbon::now(),   

            ]);
        $notification = array(
            'message' => 'Vaccination Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('vaccination.create')->with($notification);

    }

    public function VaccinationEdit($id){

        $vaccination = Vaccination::findOrFail($id);
        $diseases = Disease::latest()->get();
        
        $goats = Goat::latest()->get();

        return view('infarmer.vaccination.vaccination_edit',compact('vaccination','diseases', 'goats'));

    }

    public function VaccinationInActive($id){

        Vaccination::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Vaccination Scheduled Done',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
     }


    public function VaccinationActive($id){

        Vaccination::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Vaccination Scheduled Not Done',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        
     }

    public function VaccinationDelete($id){

        $breed = Vaccination::findOrFail($id);
        
        Vaccination::findOrFail($id)->delete();

        

        $notification = array(
            'message' => 'Vaccination Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }// end method 

     public function VaccinationDetails($id){

        $vaccination = Vaccination::with('goat', 'disease')->findOrFail($id);

        

        return view('infarmer.vaccination.vaccination_details',compact('vaccination'));

    }
}
