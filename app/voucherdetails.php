<?php

namespace App;
use Auth;
use DB;

use Illuminate\Database\Eloquent\Model;

class voucherdetails extends Model
{
	protected $table = 'voucherdetails';
    protected $fillable = ['title', 'description','company_id']; 



    public function companyregisters(){
    	 return $this->belongsTo('App\companyregisters');
    }

    public static function voucherCount()
    {
        if (Auth::check()) {
        	$userid = Auth::user()->id;
        	$voucherCount = DB::table('voucherdetails')->where('user_id',$userid)->count();
        }

        return $voucherCount;
    }

        public function addvoucher()
    {
         return $this->hasOne('App\addvoucher', 'voucher_id' , 'id');
    }



}
