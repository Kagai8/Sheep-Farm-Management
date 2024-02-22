<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disease;
use Carbon\Carbon;

class DiseasesController extends Controller
{
    public function DiseaseCreate(){

        $diseases = Disease::latest()->get();
        
        return view('infarmer.disease.disease_add', compact('diseases'));
    }


    


    public function DiseaseStore(Request $request){    


        $disease_id = Disease::insertGetId([
        'disease' => $request->disease,
        'created_by' => auth()->user()->name,
        'created_at' => Carbon::now(),   

            ]);
        $notification = array(
            'message' => 'Disease Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('disease.create')->with($notification);

    }

    public function DiseaseUpdate(Request $request){    

        $employee_id = $request->id;

        Disease::findOrFail($employee_id)->update([
        'disease' => $request->disease,
        'updated_by' => auth()->user()->name,
        'updated_at' => Carbon::now(),   

            ]);
        $notification = array(
            'message' => 'Disease Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('disease.create')->with($notification);

    }

    public function DiseaseEdit($id){

        $disease = Disease::findOrFail($id);
        return view('infarmer.disease.disease_edit',compact('disease'));

    }

    public function DiseaseDelete($id){

        $breed = Disease::findOrFail($id);
        
        Disease::findOrFail($id)->delete();

        

        $notification = array(
            'message' => 'Disease Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }// end method 

    
}
