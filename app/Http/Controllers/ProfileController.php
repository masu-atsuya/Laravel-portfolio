<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reaction;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
       $user = User::find(\Auth::id());

        return view('profile.index',compact('user'));
    }
}
