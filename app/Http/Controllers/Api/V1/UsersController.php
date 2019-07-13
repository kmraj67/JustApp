<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Requests\UserRequest;
use App\User;

class UsersController extends BaseController {
    
    protected $user;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->user = (new User());
    }
    
    /**
     * This function is used to get the list of all users
     */
    public function index(Request $request) {
        return $this->user->getList($request);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(UserRequest $request) {
        try {
            $user = $this->user->createNew($request->validated());
            return $this->sendResponse($user, 'User created successfully.');
        } catch(\Exception $ex) {
            return $this->sendError($ex->getMessage(), [], 406);
        }
    }
}
