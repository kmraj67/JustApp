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
    protected $fillable = [
        'role_id', 'first_name', 'last_name', 'email', 'password', 'status', 'remember_token',
        'created_at', 'updated_at'
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
     * This function is used to get list of users
     * 
     * @return Array array of users
     */
    public static function getList() {
        return Self::where(['role_id' => config('constants.roles.user')])
                ->orderBy("id", "DESC")
                ->paginate(config('constants.pageLimit'));
    }


    /**
     * This function is used to create a new user
     * 
     * @param Array $input validated user data array
     * @return Array user array
     */
    public static function createNew($input) {
        $input['role_id'] = config('constants.roles.user');
        $input['status']  = config('constants.status.active');
        return self::create($input);
    }
}
