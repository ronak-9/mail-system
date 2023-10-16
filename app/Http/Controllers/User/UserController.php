<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Services\UserService;
use App\Traits\ApiResponses;

class UserController extends Controller
{
    use ApiResponses;
    public function __construct(public UserService $userService, public AuthService $authService){

    }

    public function getUsersExceptLoggedIn(){
        $authUserId = $this->authService->getAuthUserId();
        $users = $this->userService->getUsersExceptLoggedIn($authUserId);
        $response = ['data' => $users];
        return $this->successResponse($response);
    }
}
