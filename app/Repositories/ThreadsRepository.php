<?php

namespace App\Repositories;

use App\Models\Thread;

class ThreadsRepository{


    public function store(array $data = []){
        return Thread::create(
            $data
        );
    }

    public function findWithRelations(int $id, array $relation){
        return Thread::with($relation)->find($id);
    }
}
