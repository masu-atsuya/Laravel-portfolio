<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function reactions_from_user()
    {
        return $this->hasMany(Reaction::class,'from_user_id');
    }
    public function reactions_to_user()
    {
        return $this->hasMany(Reaction::class,'to_user_id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

 
}

