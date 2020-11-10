<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class companyregisters extends Model
{
     protected $table = 'companyregisters';
    protected $fillable = [
        'companyName', 'companyregNo','file','category',
    ];

    public function User(){
    	 return $this->belongsTo('App\User');
    }

    public function voucherdetails()
    {
         return $this->hasMany('App\voucherdetails');
    }

    

}
