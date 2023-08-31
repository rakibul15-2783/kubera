<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'project_id', 'message_id', 'conversation'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function message(){
        return $this->belongsTo(Message::class);
    }
}
