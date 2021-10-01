<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use App\Models\Reaction;
use App\Models\User;
use App\Models\Profile;
use App\Models\Post;

class ProfileController extends Controller
{
    public function index()
    {
        $profileCheck = Profile::where('user_id', '=', \Auth::id())
            ->exists();


        if ($profileCheck) {

            $profile = Profile::with('user')
                ->where('user_id', '=', \Auth::id())
                ->first();
            return view('profile.index', compact('profile'));
        } else {
            return redirect(route('profile-create'));
        }
    }
//プロフ作成画面へ
    public function create()
    {

        $user = User::find(\Auth::id());
        return view('profile.create', compact('user'));
    }

    public function store(ProfileRequest $request)
    {

        $profile = $request->all();
        $image = $request->file('image');
        if ($request->hasFile('image')) {
            $path = \Storage::put('/public', $image);
            $path = explode('/', $path);
        } else {
            $path = null;
        }

        Profile::insert([
            'user_id' => \Auth::id(),
            'game' => $profile['game'],
            'content' => $profile['introduction'],
            'image' => $path[1],
        ]);

        return redirect(route('profile'));
    }

    public function edit()
    {

        $user = User::find(\Auth::id());
        return view('profile.edit', compact('user'));
    }
    public function update(ProfileRequest $request)
    {

        $profile = $request->all();
        $image = $request->file('image');
        if ($request->hasFile('image')) {
            $path = \Storage::put('/public', $image);
            $path = explode('/', $path);
        } else {
            $path = null;
        }
        Profile::where('user_id', '=', \Auth::id())
            ->update([
            'game' => $profile['game'],
            'content' => $profile['introduction'],
            'image' => $path[1],
        ]);

        return redirect(route('profile'));
    }

    public function post()
    {
        $posts = Post::with('game', 'type', 'condition')
            ->where('user_id', '=', \Auth::id())
            ->whereNull('deleted_at')
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('profile.post', compact('posts'));


    }
}
