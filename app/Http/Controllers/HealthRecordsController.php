<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goat;
use App\Models\HealthRecord;

use App\Models\Breed;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\Builder;

class HealthRecordsController extends Controller
{
    public function HealthRecordCreate(){
    
        $goats = Goat::latest()->get();

        $health_records = HealthRecord::with('goat')->latest()->get();
        

        return view('infarmer.health.health_add',compact('goats', 'health_records'));
    }


    


    public function HealthRecordStore(Request $request){    

            $breeding_event_id = HealthRecord::insertGetId([
            'goat_id' => $request->goat_id,
            'type_of_treatment' => $request->type_of_treatment,
            'symptoms' => $request->symptoms,
            'diagnosis' => $request->diagnosis,
            'date' => $request->date,
            'notes' => $request->notes,
            'follow_up' => $request->follow_up,
            'created_by' => auth()->user()->name,
            
            'created_at' => Carbon::now(),   

                ]);
        

            $notification = array(
                'message' => 'Health Record Inserted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('breeding-events')->with($notification);

    
}

    public function HealthRecordEdit($id){

        $ewes = Goat::where('goat_gender','Ewe')->latest()->get();
        $rams = Goat::where('goat_gender','Ram')->latest()->get();

        $breeding_event = HealthRecord::with('goat', 'ram', 'ewe')->findOrFail($id);


        return view('infarmer.breeding.breeding_edit',compact('ewes','rams','breeding_event'));

    }

    public function HealthRecordUpdate(Request $request){    

        $breeding_event_id = $request->id;

        HealthRecord::findOrFail($breeding_event_id)->update([

            'ram_id' => $request->ram_id,
            'ewe_id' => $request->ewe_id,
            'breeding_date' => $request->breeding_date,
            'expected_pregnancy_date' => $request->expected_pregnancy_date,
            'expected_birth_date' => $request->expected_birth_date,
            'notes' => $request->notes,
            
            'actual_pregnancy_date' => $request->actual_pregnancy_date,
            'actual_birth_date' => $request->actual_birth_date,
            'no_of_kids' => $request->no_of_kids,

            'updated_at' => Carbon::now(),   

            ]);
        $notification = array(
            'message' => 'Breeding Event Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('breeding-events')->with($notification);

    }

    public function HealthRecordInActive($id){

        HealthRecord::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Breeding Done',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
     }


    public function HealthRecordActive($id){
        HealthRecord::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Breeding Not Done',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        
     }

    

    

     public function HealthRecordDelete($id){

        HealthRecord::findOrFail($id)->delete();

        

        $notification = array(
            'message' => 'Breeding Record Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }// end method 

     public function HealthRecordDetails($id){

        $breeding_event = HealthRecord::with('goat', 'ram', 'ewe')->findOrFail($id);

        // Load the ram parent record
        $ram_parent = Goat::find($breeding_event->ram_id);

        // Load the ewe parent record
        $ewe_parent = Goat::find($breeding_event->ewe_id);

        return view('infarmer.breeding.breeding_details',compact('breeding_event','ram_parent','ewe_parent'));

    }
}
