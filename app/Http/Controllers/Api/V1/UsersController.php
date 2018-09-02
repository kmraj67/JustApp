<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\BaseController;
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
        try {
            $user = User::createNew($request->validated());
            return $this->sendResponse($user, 'User created successfully.');
        } catch(\Exception $ex) {
            return $this->sendError($ex->getMessage(), [], 406);
        }
    }
}
