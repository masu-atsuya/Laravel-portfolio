<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reaction;
use App\Models\Post;
use App\Models\Profile;
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
            'post_id' => $request->input('post_id'),
        ]);


        \Session::flash('success', '応募しました');
        return redirect(route('home'));
    }

    public function index()
    {

        $reactionsCheck = Reaction::where('from_user_id', '=', \Auth::id())
            ->orWhere('to_user_id', '=', \Auth::id())
            ->exists();

        if ($reactionsCheck) {

            $toUserExist = Reaction::where('from_user_id', '=', \Auth::id())
            ->where('deleted_at', '=', null)
            ->exists();

            if($toUserExist) {
                $toUsers = Reaction::with(['to_user' => function ($query) {
                    $query->with('profile');
                }])
                    ->with('from_user', 'post')
                    ->where('from_user_id', '=', \Auth::id())
                    ->where('deleted_at', '=', null)
                    ->get();
            }else {
                $toUsers = $toUserExist;

            }

            $toFromExist = Reaction::where('to_user_id', '=', \Auth::id())
            ->where('deleted_at', '=', null)
            ->exists();

            if($toFromExist) {
                $fromUsers = Reaction::with(['from_user' => function ($query) {
                    $query->with('profile');
                }])
                    ->with('to_user', 'post')
                    ->where('to_user_id', '=', \Auth::id())
                    ->where('deleted_at', '=', null)
                    ->get();
            }else {
                $fromUsers = $toUserExist;
            }

            return view('match.index', compact('fromUsers', 'toUsers'));
        } else {

            return view('match.index');
        }
    }



    public function post_show($id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            \Session::flash('err_msg', '投稿データがありません。');
            return redirect(route('home'));
        }

        return view('match.post-show', compact('post'));
    }
    public function profile_show(Request $request)
    {
        $user = User::where('id', '=', $request->from_user)
            ->with('profile')
            ->first();

        return view('match.profile-show', compact('user'));
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
                'user_id' => $request->from_user_id,
                'room_id' => $room_id
            ]);

            Reaction::where('post_id', $request->post_id)
                ->where('from_user_id', '=', $request->from_user_id)
                ->where('to_user_id', '=', \Auth::id())
                ->update(['deleted_at' => date("Y-m-d H:i:s", time())]);
        });
     
        return redirect(route('message-index'));
    }
}
