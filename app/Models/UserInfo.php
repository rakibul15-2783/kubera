<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'contact_number',
        'nid',
        'birth_c',
        'passport_no',
        'profile_image',
        'bio',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
