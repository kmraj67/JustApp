<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}
    
    /**
     * This function is used to get the list of all users
     */
    public function index() {
        return User::where(['role_id'=>2])->orderBy("id", "DESC")->paginate(1);
    }
}
