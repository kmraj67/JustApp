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
        try {
            return $this->user->getList($request);
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage(), [], $ex->getCode());
        }
    }
    
    /**
     * This function is used to get user details by user ID
     * 
     * @param integer $id User ID
     * @return json Response
     */
    public function show($id) {
        try {
            return $this->sendResponse($this->user->getDetails($id));
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage(), [], $ex->getCode());
        }
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
