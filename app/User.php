<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

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
     * The attributes that check valid sorting field and direction
     * 
     * @var arary 
     */
    protected $validSortElements = [
        'sortBy' => ['first_name', 'last_name', 'email', 'created_at', 'modified_at'],
        'direction' => ['asc', 'desc']
    ];
    
    public function role() {
        return $this->BelongsTo('App\Role', 'role_id');
    }

    /**
     * This function is used to get full name
     * 
     * @return string full name
     */
    public function getFullName() {
        return $this->first_name . ' ' . $this->last_name;
    }
    
    /**
     * This function is used to get list of users   
     * 
     * @return Array array of users
     */
    public function getList($request) {
        // Set query builder
        $query = self::query();
        
        $query->select(['id', 'role_id', 'email', 'first_name', 'last_name', 
            'status', 'created_at', 'updated_at', 
            DB::raw("concat(first_name, ' ', last_name) as full_name")]);
        
        $query->with(['role']);
        
        $query->where('role_id', '=', config('constants.roles.user'));
        
        // Search user by name and email
        if($request->has('q')) {
            $q = $request->get('q');
            $query->where( function ($searchQuery) use ($q) {
                $searchQuery->whereRaw("concat(first_name, ' ', last_name) like '%$q%'")
                           ->orWhere("email", "like", "%$q%");
            });
        }
        
        // Sort users by column name
        if($request->has('sortby') && in_array($request->get('sortby'), $this->validSortElements['sortBy'])) {
            $query->orderBy($request->get('sortby'), $request->get('direction', 'ASC'));
        } else {
            $query->orderBy('created_at', 'DESC');
        }
        
//        echo $query->toSql(); die("Here!");
        return $query->paginate(config('constants.pageLimit'));
    }


    /**
     * This function is used to create a new user
     * 
     * @param Array $input validated user data array
     * @return Array user array
     */
    public function createNew($input) {
        $input['role_id'] = config('constants.roles.user');
        $input['status']  = config('constants.status.active');
        return self::create($input);
    }
}
