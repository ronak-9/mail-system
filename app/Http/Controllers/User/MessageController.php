<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Message\MarkedReadToggleRequest;
use App\Http\Requests\User\Message\MarkedToggleRequest;
use App\Http\Requests\User\Message\ReplyMessageRequest;
use App\Http\Requests\User\Message\SendMessageRequest;
use App\Services\AuthService;
use App\Services\MessageService;
use App\Services\ThreadsService;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function __construct(public AuthService $authService, public ThreadsService $threadsService, public MessageService $messageService)
    {
    }
    public function indexAction()
    {
        $userId = $this->authService->getAuthUserId();
        $messages = $this->messageService->getCurrentUserInboxMessage($userId);
        return view('user.message.index', compact('messages'));
    }

    public function view(int $id, string $message)
    {
        $thread = $this->threadsService->getThreadMessages($id);
        $this->messageService->markedAsRead($message);
        return view('user.message.view', compact('thread'));
    }

    public function sendMessage(SendMessageRequest $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $validated['thread_id'] = $this->threadsService->getNewThreadsId();
            $validated['sender_id'] = $this->authService->getAuthUserId();
            $this->messageService->store($validated);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
        }
    }

    public function sentBox()
    {
        $userId = $this->authService->getAuthUserId();
        $messages = $this->messageService->getCurrentUserSendMessage($userId);
        return view('user.message.sent', compact('messages'));
    }

    public function reply(ReplyMessageRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $validated['sender_id'] = $this->authService->getAuthUserId();
            $this->messageService->store($validated);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
        }
    }

    public function markedReadToggle(MarkedReadToggleRequest $request,  string $id){
        $validated = $request->validated();
        if($validated['is_read'] == 0){
            $this->messageService->markedAsRead($id);
        }
        else{
            $this->messageService->markedAsUnRead($id);
        }
        
    }

    public function markedToggle(MarkedToggleRequest $request,string $id){
        $validated = $request->validated();
        if($validated['marked'] == 0){
            $this->messageService->marked($id);
        }
        else{
            $this->messageService->unMarked($id);
        }

    }
}
