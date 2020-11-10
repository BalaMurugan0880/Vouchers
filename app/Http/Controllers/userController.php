<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;

class userController extends Controller
{
     public function create(){
     
           return view('auth/profile', array('user' => Auth::User()));
       }

       public function update_avatar(Request $request)
       {
       		if ($request->hasFile('avatar')) {
       			$avatar = $request->file('avatar');
       			$filename = time() .'.'. $avatar->getClientOriginalExtension();
       			Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatar/' . $filename) );

       			$user = Auth::user();
       			$user->avatar = $filename;
       			$user->save();
       		}

       		return view('auth/profile', array('user' => Auth::User()));
       }
            
       	
}
