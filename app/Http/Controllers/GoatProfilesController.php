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


class GoatProfilesController extends Controller
{
    public function GoatProfileCreate(){
        
        $breeds = Breed::latest()->get();
        $goats = Goat::latest()->get();
        $ewes = Goat::where('goat_gender','Ewe')->latest()->get();
        $rams = Goat::where('goat_gender','Ram')->latest()->get();

        return view('infarmer.goat_profile.goat_profile_create',compact('breeds', 'ewes', 'rams','goats'));
    }


    public function GoatProfilesView(){

        // Retrieve ewe profiles
            $ewes = GoatProfile::with('goat', 'breed')
                ->whereHas('goat', function (Builder $query) {
                    $query->where('goat_gender', 'Ewe');
                })
                ->latest()
                ->get();

            // Retrieve ram profiles
            $rams = GoatProfile::with('goat', 'breed')
                ->whereHas('goat', function (Builder $query) {
                    $query->where('goat_gender', 'Ram');
                })
                ->latest()
                ->get();

        return view('infarmer.goat_profile.goat_profile_view',compact('ewes','rams'));
    }


    public function GoatProfileStore(Request $request){    

       if ($request->file('goat_image')){

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('goat_image')->getClientOriginalExtension();
            $img = $manager->read($request->file('goat_image'));
            $img = $img->resize(917,1000);


            $img->toJpeg(80)->save(base_path('public/upload/goat/'.$name_gen));
            $save_url = 'upload/goat/'.$name_gen;

            $goat_id = GoatProfile::insertGetId([
            'goat_id' => $request->goat_id,
            'ram_id' => $request->ram_id,
            'ewe_id' => $request->ewe_id,
            'breed_id' => $request->breed_id,
            'goat_color' => $request->goat_color,
            'goat_weight' => $request->goat_weight,
            'goat_height' => $request->goat_height,
            'date_born' => $request->date_born,
            'created_by' => auth()->user()->name,
            'goat_image' => $save_url,
            'created_at' => Carbon::now(),   

                ]);
        } 

        $notification = array(
            'message' => 'Goat Profile Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('goat-profiles')->with($notification);

    
}

    public function GoatProfileEdit($id){

        $breeds = Breed::latest()->get();
        $goats = Goat::latest()->get();
        $goat_profile = GoatProfile::with('goat', 'breed')->findOrFail($id);


        return view('infarmer.goat_profile.goat_profile_edit',compact('breeds','goats','goat_profile'));

    }

    public function GoatProfileUpdate(Request $request){    

        $goat_profile_id = $request->id;

        GoatProfile::findOrFail($goat_profile_id)->update([

            'ram_id' => $request->ram_id,
            'ewe_id' => $request->ewe_id,
            'breed_id' => $request->breed_id,
            'goat_color' => $request->goat_color,
            'goat_weight' => $request->goat_weight,
            'goat_height' => $request->goat_height,
            'date_born' => $request->date_born,
            'goat_maturity' => $request->goat_maturity,
            'health_status' => $request->health_status,
            'status' => $request->status,

            'updated_at' => Carbon::now(),   

            ]);
        $notification = array(
            'message' => 'Sheep Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('goat-profiles')->with($notification);

    }


    

    public function GoatProfileImageUpdate(Request $request){

        $goat_profile_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        if ($request->file('goat_image')){

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('goat_image')->getClientOriginalExtension();
            $img = $manager->read($request->file('goat_image'));
            $img = $img->resize(917,1000);


            $img->toJpeg(80)->save(base_path('public/upload/goat/'.$name_gen));
            $save_url = 'upload/goat/'.$name_gen;

            GoatProfile::findOrFail($goat_profile_id)->update([
                'goat_image' => $save_url,
                'updated_at' => Carbon::now(),

            ]);
        }

             $notification = array(
                'message' => 'Sheep Profile Image Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('goat-profiles')->with($notification);

     } // end method

     public function GoatProfileDelete($id){

        $goat = GoatProfile::findOrFail($id);

        unlink($goat->goat_image);

        GoatProfile::findOrFail($id)->delete();

        

        $notification = array(
            'message' => 'Sheep Profile Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }// end method 

     public function GoatProfileDetails($id){

        $goat_profile = GoatProfile::with('goat', 'breed')->findOrFail($id);

        // Load the ram parent record
        $ram_parent = Goat::find($goat_profile->ram_id);

        // Load the ewe parent record
        $ewe_parent = Goat::find($goat_profile->ewe_id);

        return view('infarmer.goat_profile.goat_profile_details',compact('goat_profile','ram_parent','ewe_parent'));

    }

     
}
