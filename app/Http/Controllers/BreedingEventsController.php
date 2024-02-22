<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goat;
use App\Models\GoatProfile;
use App\Models\BreedingEvent;
use App\Models\Breed;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\Builder;

class BreedingEventsController extends Controller
{
    public function BreedingEventCreate(){
    
        $ewes = Goat::where('goat_gender','Ewe')->latest()->get();
        $rams = Goat::where('goat_gender','Ram')->latest()->get();

        return view('infarmer.breeding.breeding_add',compact('ewes', 'rams'));
    }


    public function BreedingEventView(){

        // Retrieve ewe profiles
            $breeding_events = BreedingEvent::with(['ram', 'ewe'])->latest()->get();

            

        return view('infarmer.breeding.breeding_view',compact('breeding_events'));
    }


    public function BreedingEventStore(Request $request){    

            $breeding_event_id = BreedingEvent::insertGetId([
            'ram_id' => $request->ram_id,
            'ewe_id' => $request->ewe_id,
            'breeding_date' => $request->breeding_date,
            'expected_pregnancy_date' => $request->expected_pregnancy_date,
            'expected_birth_date' => $request->expected_birth_date,
            'notes' => $request->notes,
            'status' => 1,
            'created_by' => auth()->user()->name,
            
            'created_at' => Carbon::now(),   

                ]);
        

            $notification = array(
                'message' => 'Breeding Event Recorded Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('breeding-events')->with($notification);

    
}

    public function BreedingEventEdit($id){

        $ewes = Goat::where('goat_gender','Ewe')->latest()->get();
        $rams = Goat::where('goat_gender','Ram')->latest()->get();

        $breeding_event = BreedingEvent::with('goat', 'ram', 'ewe')->findOrFail($id);


        return view('infarmer.breeding.breeding_edit',compact('ewes','rams','breeding_event'));

    }

    public function BreedingEventUpdate(Request $request){    

        $breeding_event_id = $request->id;

        BreedingEvent::findOrFail($breeding_event_id)->update([

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

    public function BreedingEventInActive($id){

        BreedingEvent::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Breeding Done',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
     }


    public function BreedingEventActive($id){
        BreedingEvent::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Breeding Not Done',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        
     }

    

    

     public function BreedingEventDelete($id){

        BreedingEvent::findOrFail($id)->delete();

        

        $notification = array(
            'message' => 'Breeding Record Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }// end method 

     public function BreedingEventDetails($id){

        $breeding_event = BreedingEvent::with('goat', 'ram', 'ewe')->findOrFail($id);

        // Load the ram parent record
        $ram_parent = Goat::find($breeding_event->ram_id);

        // Load the ewe parent record
        $ewe_parent = Goat::find($breeding_event->ewe_id);

        return view('infarmer.breeding.breeding_details',compact('breeding_event','ram_parent','ewe_parent'));

    }
}
