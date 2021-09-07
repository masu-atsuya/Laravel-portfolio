<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_user_id',
        'to_post_id',
        'status',
    ];

 
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
