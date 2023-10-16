<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository {

    public function store(array $data){
        User::create($data);
    }

    public function getUsersExceptLoggedIn(int $authUserId){
        return User::select('id','email')->where('id','!=',$authUserId)->get();
    }


}
