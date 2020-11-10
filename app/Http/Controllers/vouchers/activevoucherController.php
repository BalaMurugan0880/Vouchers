<?php

namespace App\Http\Controllers\vouchers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\addvoucher;
use Auth;
use App\usersvoucher;

class activevoucherController extends Controller
{
    function index(){
  	 
   	 return view('voucher\activeVoucher');
   }

   function test_query(){


   	 $data = DB::table('companyregisters')

   	 		->join('voucherdetails','companyregisters.id','=','voucherdetails.company_id')
   	 		->join('addvouchers','voucherdetails.id','=','addvouchers.voucher_id')
   	 		->select('voucherdetails.description','companyregisters.companyName','addvouchers.voucherCode', 'addvouchers.voucherTitle' , 'companyregisters.file', 'addvouchers.quantity','addvouchers.id','addvouchers.expired','addvouchers.expiredDate')
   	 		 ->where(['addvouchers.expired' => '0'])
   	 		->get();

   	 

   	 return view('voucher\activeVoucher',['data' => $data]);
   }

       public function reedemVoucher(Request $request){

      $id = $request->input('voucherid');
      $userid = Auth::user()->id;
      $redeemer =  DB::table('users_voucher')->where('user_id', $userid)->where('voucher_id', $id )->exists();

      $voucherRedeem = DB::table('users_voucher')->where('user_id',$userid)->count();
      $data = DB::table('users')->where('id', $userid)->first(['vendorType', 'addvoucher_count']);
      $vendortype = data_get($data, 'vendorType');
       
      if ($vendortype == 'basicuserPackage') {
          if ($voucherRedeem >= 3 ) {
             return redirect('activeVoucher')->with('message', trans('Upgrade To Advance Package To Redeem More Vouchers'));
          }else{
               if ($redeemer)  
             {
                
                         return redirect('activeVoucher')->with('message', trans('Already Redeem This Voucher'));
              
             }else

             {
                  DB::table('addvouchers')->where('id', $id)->decrement('quantity', 1);
                  DB::table('addvouchers')->where('id', $id)->increment('is_redeemed', 1);
                 
                         $uservoucher = new usersvoucher();
                 
                         $uservoucher->voucher_id = $request->input('voucherid');
                         $uservoucher->user_id = Auth::user()->id;
                         $uservoucher->save();
                         return redirect('activeVoucher')->with('message', trans('Voucher Redeemed Successfully'));
             }
          }
          
      }elseif ($vendortype == 'advanceuserPackage') {
        if ($voucherRedeem >= 5 ) {
             return redirect('activeVoucher')->with('message', trans('Upgrade To Premium Package To Redeem More Vouchers'));
          }else{
               if ($redeemer)  
             {
                
                         return redirect('activeVoucher')->with('message', trans('Already Redeem This Voucher'));
              
             }else

             {
                 DB::table('addvouchers')->where('id', $id)->decrement('quantity', 1);
                 DB::table('addvouchers')->where('id', $id)->increment('is_redeemed', 1);
                 
                         $uservoucher = new usersvoucher();
                 
                         $uservoucher->voucher_id = $request->input('voucherid');
                         $uservoucher->user_id = Auth::user()->id;
                         $uservoucher->save();
                         return redirect('activeVoucher')->with('message', trans('Voucher Redeemed Successfully'));
             }
          }
      }elseif (is_null($vendortype)) {
        if ($voucherRedeem >= 1 ) {
             return redirect('activeVoucher')->with('message', trans('Upgrade To Basic Package To Redeem More Vouchers'));
          }else{
               if ($redeemer)  
             {
                
                         return redirect('activeVoucher')->with('message', trans('Already Redeem This Voucher'));
              
             }else

             {
                 DB::table('addvouchers')->where('id', $id)->decrement('quantity', 1);
                 DB::table('addvouchers')->where('id', $id)->increment('is_redeemed', 1);
                 
                         $uservoucher = new usersvoucher();
                 
                         $uservoucher->voucher_id = $request->input('voucherid');
                         $uservoucher->user_id = Auth::user()->id;
                         $uservoucher->save();
                         return redirect('activeVoucher')->with('message', trans('Voucher Redeemed Successfully'));
             }
          }
      }else{
            if ($redeemer)  
             {
                
                         return redirect('activeVoucher')->with('message', trans('Already Redeem This Voucher'));
              
             }else

             {
                 DB::table('addvouchers')->where('id', $id)->decrement('quantity', 1);
                 DB::table('addvouchers')->where('id', $id)->increment('is_redeemed', 1);
                 
                         $uservoucher = new usersvoucher();
                 
                         $uservoucher->voucher_id = $request->input('voucherid');
                         $uservoucher->user_id = Auth::user()->id;
                         $uservoucher->save();
                         return redirect('activeVoucher')->with('message', trans('Voucher Redeemed Successfully'));
             }
      }
     

      
         


        $datas = addvoucher::find($id);

         if ($datas->quantity == 0) 
         {
                $datas->expired = 1;
         }else
         {
            $datas->expired = 0;
         }

         $datas->save();
          
        

         return redirect('activeVoucher');


   }
}
