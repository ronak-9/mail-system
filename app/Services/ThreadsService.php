<?php
namespace App\Services;

use App\Repositories\ThreadsRepository;

class ThreadsService{

    public function __construct(public ThreadsRepository $threadsRepository) {

    }

    public function store(array $data = []){
        return $this->threadsRepository->store($data);
    }

    public function getNewThreadsId(array $data = []){
        return $this->threadsRepository->store($data)->id;
    }

    public function findWithRelations(int $id, array $relation){
        return $this->threadsRepository->findWithRelations($id, $relation);
    }

    public function getThreadMessages(int $id){
        $relation = ['messages.sender','messages.receiver'];
        return $this->findWithRelations($id, $relation);
    }
}
