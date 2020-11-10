<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class packageController extends Controller
{

	  public function __construct()
    {
        $this->middleware('auth');
    }

     public function create(){
    	return view ('package');
    }

    public function store(Request $request){

    	$user = $request->user();
        $data = DB::table('users')->where('id', $user->id)->first(['vendorType']);
        $vendorvalue = $request->input('vendorValue');

        $vendortype = data_get($data, 'vendorType');

        if ($vendortype ==  $vendorvalue) {
        	return redirect('voucherdetails')->with('message', trans('Already Subscribed  , Add Vouchers Now!'));
        }else{
       		    $id = Auth::user()->id;
    			$data = DB::table('users')->where('id', $id)->update(['vendorType' =>  $vendorvalue]);
    			return redirect('voucherdetails')->with('message', trans('You Have Successfully Subscribe, Add Voucher Now!  ' ));
        }
    	
    	
    }

}
