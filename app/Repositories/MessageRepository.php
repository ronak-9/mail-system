<?php

namespace App\Repositories;

use App\Models\Message;

class MessageRepository{

    public function store(array $data){
        Message::create($data);
    }

    public function getPaginateUsingFilterWithRelation(int $value, array $filter, array $relation){
        return Message::select('id','sender_id','receiver_id','thread_id','subject','is_read','is_marked','created_at')->with($relation)
        ->where($filter)
        ->paginate($value);
    }

    public function showUsingThread(int $thread_id){
        return Message::where(['thread_id' => $thread_id])->get();
    }

    public function find(string $id){
        return Message::find($id);
    }

    public function update(array $data, string $id){
        $this->find($id)->update($data);
    }
}
