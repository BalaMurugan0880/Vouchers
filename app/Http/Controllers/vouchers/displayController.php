<?php

namespace App\Http\Controllers\vouchers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class displayController extends Controller
{
   function test_query(){


   	 $data = DB::table('companyregisters')

   	 		->join('voucherdetails','companyregisters.id','=','voucherdetails.company_id')
   	 		->join('addvouchers','voucherdetails.id','=','addvouchers.voucher_id')
   	 		->select('voucherdetails.description','companyregisters.companyName','addvouchers.voucherCode', 'addvouchers.voucherTitle', 'addvouchers.quantity')
   	 		->get();

   	 

   	 return view('displayVouchers',['data' => $data]);
   }
}
