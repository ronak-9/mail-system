<?php
namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService {
    public function __construct(public UserRepository $userRepository) {

    }

    public function store(array $data){
        $data['password'] = $this->hashing($data['password']);
        $this->userRepository->store($data);
    }

    public function hashing($value){
        return Hash::make($value);
    }

    public function getUsersExceptLoggedIn(int $authUserId){
        return $this->userRepository->getUsersExceptLoggedIn($authUserId);
    }
}
