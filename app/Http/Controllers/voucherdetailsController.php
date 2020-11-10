<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\voucherdetails;
use Auth;
use App\User;
use App\companyregisters;
use App\usersvoucher;
use DB;

class voucherdetailsController extends Controller
{

	   public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
    	return view ('voucherdetails');
    }

     public function store(Request $request){
	    
	    $voucherdetail = new voucherdetails();

        $voucherdetail->title = $request->input('title');
        $voucherdetail->description = $request->input('description');
        $voucherdetail->user_id = Auth::user()->id;


        $id = Auth::user()->id;#Authenticate User's ID
        $user      = User::find($id);#Find user that login using authenticate user ID
        $company   = $user->companyregisters;#find users company register row in companyregister table
        $companyId = $company->id;#Get companyregister ID that Belongs to user that login 

        $voucherdetail->company_id = $companyId;

        $voucherCount = voucherdetails::voucherCount();

        $data = DB::table('users')
                ->where('id', $id)
               ->update(['addvoucher_count' => $voucherCount + 1]);

        $voucherdetail->save();
        
        return redirect()->to('addvoucher');
	    	
	    }
}
