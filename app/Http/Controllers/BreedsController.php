<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Breed;
use Carbon\Carbon;
use Intervention\Image\Laravel\Facades\Image;

class BreedsController extends Controller
{
    public function BreedCreate(){
        
        return view('infarmer.breed.breed_create');
    }


    public function BreedView(){

        $breeds = Breed::latest()->get();
        return view('infarmer.breed.breed_view',compact('breeds'));
    }


    public function BreedStore(Request $request){    


        $breed_id = Breed::insertGetId([
        'breed' => $request->breed,
        'created_by' => auth()->user()->name,
        'created_at' => Carbon::now(),   

            ]);
        $notification = array(
            'message' => 'Breed Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('breed.view')->with($notification);

    }

    public function BreedUpdate(Request $request){    

        $employee_id = $request->id;

        Breed::findOrFail($employee_id)->update([
        'breed' => $request->breed,
        'created_by' => auth()->user()->name,
        'updated_at' => Carbon::now(),   

            ]);
        $notification = array(
            'message' => 'Breed Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('breed.view')->with($notification);

    }

    public function BreedEdit($id){

        $breed = Breed::findOrFail($id);
        return view('infarmer.breed.breed_edit',compact('breed'));

    }

    public function EmployeeImageUpdate(Request $request){
        $employee_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('employee_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/employee/'.$name_gen);
            $save_url = 'upload/employee/'.$name_gen;

            Employee::findOrFail($employee_id)->update([
                'employee_image' => $save_url,
                'updated_at' => Carbon::now(),

            ]);

             $notification = array(
                'message' => 'Employee Image Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('manage-employee')->with($notification);

     } // end method

     public function BreedDelete($id){

        $breed = Breed::findOrFail($id);
        
        Breed::findOrFail($id)->delete();

        

        $notification = array(
            'message' => 'Breed Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }// end method 

     public function EmployeePerformance($id){

        $employee = Employee::findOrFail($id);
        return view('admin.backend.employee.performance',compact('employee'));

    }

}
