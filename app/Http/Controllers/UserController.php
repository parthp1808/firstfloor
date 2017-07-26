<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;

class UserController extends Controller
{
    
	public function show()
    {
        return view('view-profile');
    }
    public function dashboard()
    {
        $user = Auth::user();
        $properties = $user->properties_listed;
        return view('dashboard',compact('properties'));
    }

    public function edit()
    {
        return view('edit-profile');
    }
    public function update(Request $req) {
    	// dd($req->all());
    	$this->validate($req, [
                'name' => 'required|min:2',
                'email' => 'required|email||unique:users,email,'.Auth::id(),
                'number' => 'required|min:10|numeric',

        ]);
        
		$user = Auth::user();
		// dd($req->input('name'));
		$user->name = $req->name;
		$user->email = $req->email;
		$user->number = $req->number;
		$user->postal_code = $req->postal;
		$user->save();
		
		// return response ()->json ( $user );
		return view('view-profile');
	}

    public function uploadProfile(Request $req) {

        $photo = $req->image;
        $filename = $photo->store('img/profile');
        $user = Auth::user();
        Storage::delete($user->avatar);
        $user->avatar = $filename;
        $user->save();
        return back();

    }
}
