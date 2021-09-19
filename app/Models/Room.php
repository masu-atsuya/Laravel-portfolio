<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function user_room()
    {
        return $this->hasMany(UserRoom::class);
    }
    public function message()
    {
        return $this->hasOne(Message::class)->latest();
    }
}
