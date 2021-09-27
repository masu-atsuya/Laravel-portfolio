<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\UserRoom;
use App\Models\Room;
use DB;


class MessageController extends Controller
{
    public function index()
    {
        $rooms = UserRoom::select()
            ->where('user_id', '=', \Auth::id())
            ->get();
        if (!empty($rooms)) {
            \Session::flash('err_msg', 'マッチングした投稿がありません');
            return redirect(route('match-index'));
        }
        foreach ($rooms as $room) {

            $user = UserRoom::with(['user' => function ($query) {
                $query->with('profile');
            }])
                ->with(['room' => function ($query) {
                    $query->with('message');
                }])
                ->where('room_id', '=', $room['room_id'])
                ->where('user_id', '!=', \Auth::id())
                ->latest()
                ->first();
            $users[] = $user;
        }


        return view('message.index', compact('users'));
    }
    public function json_data($id)
    {
        // $messages = Message::all();
        $messages = Message::where('room_id', '=', $id)
            ->get();
        return [
            'messages' => $messages
        ];
    }
    public function json_create(Request $request)

    {
        Message::insert([
            'comment' => $request->input('comment'),
            'room_id' => $request->room,
            'user_id' => $request->user,

        ]);
    }
    public function show($id)
    {

        $room = Room::select('id')
            ->where('id', '=', $id)
            ->first();

        $user = User::select('id')
            ->where('id', '=', \Auth::id())
            ->first();

        return view('message.show', compact('room', 'user'));
    }
}
