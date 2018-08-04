<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Http\Requests\UserRequest;
use App\User;

class UsersController extends BaseController {
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
        return User::getList();
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(UserRequest $request) {
        $user = User::createNew($request->validated());
        return $this->sendResponse($user, 'User created successfully.');
    }
}
