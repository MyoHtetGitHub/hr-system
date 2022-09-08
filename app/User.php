<?php

namespace App;
use App\Department;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DarkGhostHunter\Larapass\Contracts\WebAuthnAuthenticatable;
use DarkGhostHunter\Larapass\WebAuthnAuthentication;

class User extends Authenticatable implements WebAuthnAuthenticatable
{
    use Notifiable,HasRoles,WebAuthnAuthentication;

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
    
    //join to the department table

    public function department(){
    return $this->belongsTo(Department::class,'department_id','id');
    }

    //this keyworkd refer to User modle 
    //User model refeer to User table
    public function user_image_path(){
        if($this->profile_img){
         return asset('storage/employee/' .$this->profile_img);
        }
        return null;
    }
}
