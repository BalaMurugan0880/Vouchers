<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\addvoucher;
use Auth;
use App\voucherdetails;
use App\User;



class addvoucherController extends Controller
{

	   public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
    	return view('addvoucher');
    }

    public function store(Request $request){

    	$addvoucher = new addvoucher();

        $addvoucher->voucherTitle = $request->input('voucherTitle');
        $addvoucher->voucherCode = $request->input('voucherCode');
        $addvoucher->user_id = Auth::user()->id;
        $addvoucher->quantity = $request->input('quantity');
        $addvoucher->expiredDate = $request->input('datepicker');


        $voucher   = voucherdetails::orderBy('id', 'desc')->first()->id; 


        $addvoucher->voucher_id = $voucher;



        $addvoucher->save();
        
        return redirect()->to('displayVouchers');

    }
}
