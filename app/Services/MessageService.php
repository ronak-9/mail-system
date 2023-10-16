<?php
namespace App\Services;

use App\Repositories\MessageRepository;

class MessageService{

    public function __construct(public MessageRepository $messageRepository) {

    }

    public function store(array $data){
        $this->messageRepository->store($data);
    }

    public function getPaginateUsingFilter(int $value, array $filter, array $relations){
        return $this->messageRepository->getPaginateUsingFilterWithRelation($value, $filter, $relations);
    }

    public function getCurrentUserInboxMessage(int $userId){
        $filter = ['receiver_id' => $userId];
        $relation = ['sender:id,name'];
        return $this->getPaginateUsingFilter(10, $filter, $relation);
    }

    public function getCurrentUserSendMessage(int $userId){
        $filter = ['sender_id' => $userId];
        $relation = ['receiver:id,name'];
        return $this->getPaginateUsingFilter(10, $filter, $relation);
    }

    public function markedAsRead(string $id){
        $this->messageRepository->update(['is_read'=> 1], $id);
    }

    public function markedAsUnRead(string $id){
        $this->messageRepository->update(['is_read'=> 0], $id);
    }

    public function marked(string $id){
        $this->messageRepository->update(['is_marked'=> 1], $id);
    }

    public function unMarked(string $id){
        $this->messageRepository->update(['is_marked'=> 0], $id);
    }
}
