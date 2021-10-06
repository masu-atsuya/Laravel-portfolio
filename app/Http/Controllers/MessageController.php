<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\UserRoom;
use App\Models\Room;
use Carbon\Carbon;

use function PHPUnit\Framework\isEmpty;

class MessageController extends Controller
{
    public function index()
    {
        $rooms = UserRoom::where('user_id', '=', \Auth::id())
        ->exists();
        
        if (!$rooms) {
            \Session::flash('err_msg', 'マッチングした投稿がありません');
            return redirect(route('match-index'));
            
        }else {
            $rooms = UserRoom::where('user_id', '=', \Auth::id())
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
            dd($users);
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
            'comment' => $request->comment,
            'room_id' => $request->room,
            'user_id' => $request->user,

        ]);
    }
    public function show($room_id, $user_id)
    {

        $room = Room::select('id')
            ->where('id', $room_id)
            ->first();

        $user = User::select('id')
            ->where('id', \Auth::id())
            ->first();

        $from_user = User::with('profile')
            ->where('id', $user_id)
            ->first();
     


        return view('message.show', compact('room', 'user', 'from_user'));
    }
}
