<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Redirect;

class userdisplayController extends Controller
{

	    public function __construct()
    {
        $this->middleware('auth');
    }

   function user_table(){

   	 $users = User::all();
   	 return view('admin.adminhome')->with('users', $users);
   }

   public function approved(Request $request, $id){
        $data = User::find($id);

        if ($data->approved == 0){

            $data->approved=1;

        }else{

            $data->approved=0;
        }
        $data->save();

        return Redirect::to('adminhome')->with('message', $data->name.' Status Has Been Change Successfully');
    }
}
