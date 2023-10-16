<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Services\UserService;
use App\Traits\ApiResponses;

class RegisterController extends Controller
{
    use ApiResponses;

    public function __construct(public UserService $userServices){

    }
    public function register()
    {
        return view('user.auth.register');
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $this->userServices->store($data);
        $response = ['message'=> __('message.registerSuccess')];
        return $this->successResponse($response);
    }

    
}
