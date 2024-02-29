<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function ViewUser()
    {
       
        $users = User::latest()->get();

        return view('infarmer.users.user_add',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CreateUser()
    {

        $users = User::latest()->get();

        return view('infarmer.users.user_add',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function StoreUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'username' => 'required|string|unique:users,username|max:255',
            'password' => 'required|string|min:8',
            'gender' => 'required|string|max:255',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->gender = $request->gender;
        $user->password = Hash::make($request->password);

        $user->save();

        $notification = [
            'message' => 'User created successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('create-user')->with($notification);
    

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function EditUser($id)
    {
        $user = User::find($id);
        return view('infarmer.users.user_edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateUser(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('users', 'email')->ignore($id), // Ignore the current user's email
        ],
        'username' => [
            'required',
            'string',
            'max:255',
            Rule::unique('users', 'username')->ignore($id), // Ignore the current user's username
        ],
        'password' => 'nullable|string|min:8', // Password is optional during update
        'gender' => 'required|string|max:255',
    ]);

    $user = User::findOrFail($id);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->username = $request->username;
    $user->gender = $request->gender;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    $notification = [
        'message' => 'User updated successfully',
        'alert-type' => 'success',
    ];

    return redirect()->route('create-user')->with($notification);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeleteUser($id)
    {
       if(auth()->user()->id == $id){
            abort(401);
       }
       $user = User::find($id);
       $user->delete();
       
        return redirect()->route('create-user')->with('message','User Deleted Successfully');

    }

    public function UserChangePassword()
    {
        return view('infarmer.users.change_password');
    }

    public function UserUpdatePassword(Request $request)
{
    $request->validate([
        'password' => 'nullable|string|min:8',
    ]);

    // Retrieve the authenticated user
    $user = auth()->user();

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    // Update the password if provided in the request
    if ($request->has('password')) {
        $user->password = bcrypt($request->password);
        $user->save();
    }
    $notification = [
            'message' => 'Password Changed Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
