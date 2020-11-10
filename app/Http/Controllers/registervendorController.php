<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\AdminNewUserNotification;
use App\Providers\RouteServiceProvider;
use App\User;
use App\role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class registervendorController extends Controller
{


        public function store(Request $request)
    {	
    	$this->validate(request(),[
            'name'=>'required|string',
            'email'=>'required|unique:users|email|string',
            'password' => 'required|confirmed',
            'vendorType' => 'required',
        ]);
        
    	 $user = User::create([ 
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'vendorType' => request('vendorType'),
            ]);

    $role = Role::where('name', 'vendor')->first();

    $user->roles()->attach($role->id);

        $administrators = User::whereHas('roles', function($q){
            $q->where('name', 'Admin');
        })->get();

  

        foreach ($administrators as $administrator) {
            $administrator->notify(new AdminNewUserNotification($user));
            # code...
        }

        return redirect('login')->with('message', trans('Your Account Needs Admin Approval'));
    }

  
}
