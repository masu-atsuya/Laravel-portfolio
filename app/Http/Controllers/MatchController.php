<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reaction;
use App\Models\Post;
use App\Models\Room;
use App\Models\Game;
use App\Models\UserRoom;
use App\Models\User;
use DB;

class MatchController extends Controller
{
    public function store(Request $request)
    {
        Reaction::create([
            'from_user_id' => \Auth::id(),
            'to_user_id' => $request->input('to_user_id'),
            'status' => $request->input('status'),
            'post_id' => $request->input('post_id'),

        ]);


        return view('post.entry');
    }

    public function index()
    {

        $reactionsCheck = Reaction::with('from_user', 'to_user')
            ->where('from_user_id', '=', \Auth::id())
            ->exists();


        if ($reactionsCheck) {
            $reactions = Reaction::with('from_user', 'to_user', 'post')
                ->where('from_user_id', '=', \Auth::id())
                ->get();


            return view('match.index', compact('reactions'));
        } else {

            return view('match.index');
        }


        // return view('match.index', compact('reactions'));
    }



    public function show($id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            \Session::flash('err_msg', '投稿データがありません。');
            return redirect(route('home'));
        }

        return view('match.show', compact('post'));
    }


//承認済みになった人との一対一のチャットルーム作成

    public function  approval(Request $request)
    {
        DB::transaction(function () use ($request) {

            $room_id = Room::insertGetId([]);
            UserRoom::insert([
                'user_id' => \Auth::id(),
                'room_id' => $room_id,
            ]);
            UserRoom::insert([
                'user_id' => $request->input('post_id'),
                'room_id' => $room_id
            ]);
        });

        $reactions = Reaction::with('from_user', 'to_user', 'post')
            ->where('from_user_id', '=', \Auth::id())
            ->get();

            $room = UserRoom::with('user','room')
            ->where('user_id','=',\Auth::id())
            ->get();

        
        return view('match.index', compact('user','room'));
    }
}
