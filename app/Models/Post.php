<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }
}
