<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    protected $casts = [
        'admin' => 'boolean'
    ];

     public static function boot(){

        parent::boot(); 

        /* Delete All Comments when deleting  */
        static::deleting(function($user){

         $user->workspaces->each->delete();
         
        });
    }

    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRouteKeyName(){

        return 'username' ;
    }

   

    public function workspaces(){

        return $this->hasMany('App\Workspace');
    }

    /**
    * Every User has One Profile 
    */
    public function profile(){

        return $this->hasOne('App\Profile');
    }


    public function projects(){


        return $this->belongsToMany('App\Workspace','participants')
            ->withTimeStamps()
            ->latest('pivot_created_at');
    }


    //determine if a user is admin 
    public function isAdmin(){

        return $this->admin ; 
    }


  
}
