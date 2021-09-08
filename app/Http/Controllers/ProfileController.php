<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reaction;
use App\Models\User;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profileCheck = Profile::where('user_id','=',\Auth::id())
        ->exists();

        // dd($profileCheck);


        if($profileCheck) {

            $profile = Profile::with('user')
            ->where('user_id','=',\Auth::id())
            ->first();



            return view('profile.index',compact('profile'));
        }else {
            return redirect(route('profile-edit')); 
        }
    }

    public function edit() {

        $user = User::find(\Auth::id());
        return view('profile.edit',compact('user'));
    }

    public function store(Request $request) {

        $profile = $request->all();



        Profile::insert([
            'user_id' => \Auth::id(),
            'game' => $profile['game'],
            'content' => $profile['content'],

        ]);

        return redirect(route('profile')); 

    }




    
}
