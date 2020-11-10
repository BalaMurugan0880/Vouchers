<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id','email_verified_at','approved','vendorType','addvoucher_count',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function companyregisters()
    {
         return $this->hasOne('App\companyregisters');
    }

    public function roles()
    {
        return $this->belongsToMany('App\role');
    }

    public function usersvoucher()
    {
        return $this->belongsTo('App\usersvoucher','user_id','id');
    }

    public function hasAnyRoles($roles)
    {
        if($this->roles()->whereIn('name', $roles)->first()){
            return true;
        }
        return false;
    }

      public function hasRole($role)
    {
        if($this->roles()->where('name', $role)->first()){
            return true;
        }
        return false;
    }

    public function hasuserID($userid)
    {
        if($this->companyregisters()->where('user_id', $userid)->first()){
            return true;
        }
        return false;
    }


}
