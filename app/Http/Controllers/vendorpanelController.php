<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\addvoucher;

class vendorpanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   function addvoucher_table(){

   			$userid = Auth::user()->id;

			$data = DB::table('voucherdetails')

   	 		->join('addvouchers','voucherdetails.id','=','addvouchers.voucher_id')
   	 		->select('voucherdetails.description','addvouchers.voucherCode', 'addvouchers.voucherTitle','addvouchers.quantity','addvouchers.expired','addvouchers.expiredDate','addvouchers.id','addvouchers.voucher_id','addvouchers.is_redeemed')
            ->where(['voucherdetails.user_id' => $userid ])
   	 		->get(); 

        $test = DB::table('users')->select('addvoucher_count','vendorType')->where(['users.id' => $userid])->get();
        $total_redeemed = $data->sum('is_redeemed');

   	 

   	 return view('/vendor/vendorpanel',compact('data', 'test', 'total_redeemed'));
   }


   public function store(Request $request)
   {
   		$user = $request->user();
        $data = DB::table('users')->where('id', $user->id)->first(['vendorType']);
        $voucherid = $request->input('voucherid');
        $vouchercode = $request->input('voucherCode');
        $voucherTitle = $request->input('voucherTitle');
        $description = $request->input('description');
        $expiredDate = $request->input('datepicker');
        $quantity = $request->input('quantity');

        $vendortype = data_get($data, 'vendorType');


        if ($vendortype == 'basicPackage') {

        $data2 = DB::table('addvouchers')->where('voucher_id', $voucherid)->update(['voucherCode' =>  $vouchercode]);
        $data12 = DB::table('addvouchers')->where('voucher_id', $voucherid)->update(['voucherTitle' =>  $voucherTitle]);
        $data13 = DB::table('voucherdetails')->where('id', $voucherid)->update(['description' =>  $description]);
    	return redirect('vendorpanel')->with('message', trans('Succesfully Update' ));

        }elseif ($vendortype == 'advancePackage') {

        $data3 = DB::table('addvouchers')->where('voucher_id', $voucherid)->update(['voucherCode' =>  $vouchercode]);
        $data4 = DB::table('addvouchers')->where('voucher_id', $voucherid)->update(['voucherTitle' =>  $voucherTitle]);
        $data5 = DB::table('voucherdetails')->where('id', $voucherid)->update(['description' =>  $description]);
        $data6 = DB::table('addvouchers')->where('voucher_id', $voucherid)->update(['expiredDate' =>  $expiredDate]);
    	return redirect('vendorpanel')->with('message', trans('Succesfully Update' ));

        }elseif ($vendortype == 'premiumPackage') {

        $data7 = DB::table('addvouchers')->where('voucher_id', $voucherid)->update(['voucherCode' =>  $vouchercode]);
        $data8 = DB::table('addvouchers')->where('voucher_id', $voucherid)->update(['voucherTitle' =>  $voucherTitle]);
        $data9 = DB::table('voucherdetails')->where('id', $voucherid)->update(['description' =>  $description]);
        $data10 = DB::table('addvouchers')->where('voucher_id', $voucherid)->update(['expiredDate' =>  $expiredDate]);
        $data11 = DB::table('addvouchers')->where('voucher_id', $voucherid)->update(['quantity' =>  $quantity]);
    	return redirect('vendorpanel')->with('message', trans('Succesfully Update' ));

        }elseif (is_null($vendortype)) {
        	return redirect('vendorpanel')->with('message', trans('Subscribe A Package To Edit Your Voucher' ));
        }
   		
   }

}
