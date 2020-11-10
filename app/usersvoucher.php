<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersvoucher extends Model
{
	protected $table = 'users_voucher';

     public function addvoucher()
    {
         return $this->hasOne('App\addvoucher','voucher_id','id');
    }

      public function User()
    {
         return $this->hasMany('App\User', 'user_id' , 'id');
    }



}
