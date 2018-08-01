<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\User;
use Validator;

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
        return User::where(['role_id'=>2])->orderBy("id", "DESC")->paginate(1);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        $input = $request->all();

        $validator = Validator::make($input, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input['status'] = config('constants.status.inactive');
        $user = User::create($input);
        return $this->sendResponse($user->toArray(), 'User created successfully.');
    }
}
