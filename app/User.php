<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // public function roles(){
    //     return $this->belongsToMany('App\Role');
    // }

    // public function autoriceroles($roles){
    //     if ($this->hasanyrole($roles)) {
    //         return true;
            
    //     }
    //     abort(401,'accion no autorizada');
    // }

    // public function hasanyrole($roles){
    //     if (is_array($roles)) {
    //         foreach ($roles as $role) {
    //             if ($this->hasrole($roles)) {
    //             return true;
    //         }
    //         }
    //     } else{
    //         if ($this->hasrole($roles)) {
    //             return true;
    //         }
    //     }

    //     return false;

    // }

    // public function hasrole($role){

    //     if ($this->roles()->where('name',$role)->first()) {

    //         return true;
    //     }

    //     return false;
    // }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
}
