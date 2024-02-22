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

            $health_record_id = HealthRecord::insertGetId([
            'goat_id' => $request->goat_id,
            'type_treatment' => $request->type_treatment,
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

            return redirect()->route('health-record-create')->with($notification);

    
}

    public function HealthRecordEdit($id){

        $health_record = HealthRecord::with('goat')->findOrFail($id);
        $goats = Goat::latest()->get();

        return view('infarmer.health.health_edit',compact('health_record', 'goats'));

    }

    public function HealthRecordUpdate(Request $request){    

        $health_record_id = $request->id;

        HealthRecord::findOrFail($health_record_id)->update([

            'goat_id' => $request->goat_id,
            'type_treatment' => $request->type_treatment,
            'symptoms' => $request->symptoms,
            'diagnosis' => $request->diagnosis,
            'date' => $request->date,
            'notes' => $request->notes,
            'follow_up' => $request->follow_up,
            'updated_by' => auth()->user()->name,

            'updated_at' => Carbon::now(),   

            ]);
        $notification = array(
            'message' => 'Health Record Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('health-record-create')->with($notification);

    }

     public function HealthRecordDelete($id){

        HealthRecord::findOrFail($id)->delete();

        

        $notification = array(
            'message' => 'Health Record Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }// end method 

     public function HealthRecordDetails($id){

        $health_record = HealthRecord::with('goat')->findOrFail($id);

        return view('infarmer.health.health_details',compact('health_record'));

    }
}
