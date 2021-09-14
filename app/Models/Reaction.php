<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'status',
        'post_id',
    ];

 
    // public function post()
    // {
    //     return $this->belongsTo(Post::class);
    // }
 
    public function from_user()
    {
        return $this->belongsTo(User::class,'from_user_id');
    }
    public function to_user()
    {
        return $this->belongsTo(User::class,'to_user_id');
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
