<?php

namespace App\Http\Controllers\vouchers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class expiredvoucherController extends Controller
{
    function index(){
  	 
   	 return view('voucher\expiredVoucher');
   }

   function test_query(Request $request){


   	 $data = DB::table('companyregisters')

   	 		->join('voucherdetails','companyregisters.id','=','voucherdetails.company_id')
   	 		->join('addvouchers','voucherdetails.id','=','addvouchers.voucher_id')
   	 		->select('voucherdetails.description','companyregisters.companyName','addvouchers.voucherCode', 'addvouchers.voucherTitle' , 'companyregisters.file', 'addvouchers.quantity','addvouchers.id','addvouchers.expired','addvouchers.expiredDate')
   	 		->get();

            

   	 return view('voucher/expiredVoucher',['data' => $data]);
   }
}
