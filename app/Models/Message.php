<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasUuids;

    protected $fillable = ['sender_id', 'receiver_id', 'subject', 'body', 'thread_id', 'is_read', 'is_marked'];

    protected function createdAt(): Attribute{
        return Attribute::make(get: fn($value) => \Carbon\Carbon::parse($value)->diffForhumans());
    }

    public function sender(): BelongsTo{
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function receiver(): BelongsTo{
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }
}
