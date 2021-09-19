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
    public function json_data()
    {
        $messages = Message::all();
        return [
            'messages' => $messages
        ];
    }
    public function json_create(Request $request)
    {
        Message::insert([
            'comment' => $request->comment,
        ]);
    }
    public function show($id)
    {
        $messages = Message::where('room_id','=',$id)
        ->get();

        // dd($messages);
        return view('message.show', compact('messages'));
    }
}
