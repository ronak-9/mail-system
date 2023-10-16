<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AuthUserRequest;
use App\Services\AuthService;
use App\Traits\ApiResponses;

class LoginController extends Controller
{
    use ApiResponses;
    public function __construct(public AuthService $authServices){

    }
    public function login(){
        return view('user.auth.login');
    }

    public function authentication(AuthUserRequest $request){
        $validated = $request->validated();
        $auth = $this->authServices->authentication($validated);
        if($auth){
            $response = ['status'=> true];
        }
        else{
            $response = ['status'=> false, 'message'=>__('validation.current_password')];
        }
        return $this->successResponse($response);
    }

    public function logout(){
        $this->authServices->logout();
        return redirect()->route('user.login');
    }
}
