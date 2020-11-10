<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\users;
use DB;
use Auth;

class addvoucher extends Model
{
    protected $table = 'addvouchers';

    protected $fillable = ['voucherTitle','voucherCode','voucher_id','quantity', 'expired', 'expiredDate' , 'is_redeemed'];


	public function voucherdetails(){
    	 return $this->belongsTo('App\voucherdetails', 'voucher_id' , 'id');
    }

     	public function usersvoucher()
    {
         return $this->belongsToMany('App\usersvoucher', 'voucher_id' , 'id');
    }

    public static function vendortype()
    {
        if (Auth::check()) {
        	$userid = Auth::user()->id;
			$data = DB::table('users')->where('id', $userid)->first(['vendorType']);
			$vendortype = data_get($data, 'vendorType');
        }

        return $vendortype;
    }

    public static function addvoucherCount()
    {
        if (Auth::check()) {
            $userid = Auth::user()->id;
            $data2 = DB::table('users')->where('id', $userid)->first(['addvoucher_count']);
            $voucherCount = data_get($data2, 'addvoucher_count');
        }

        return $voucherCount;
    }






}
