<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reaction;
use App\Models\Post;

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
            $reactions = Reaction::with('from_user', 'to_user','post')
                ->where('from_user_id', '=', \Auth::id())
                ->get();


            return view('match.index', compact('reactions'));
        }else {

            return view('match.index');
        }


        // return view('match.index', compact('reactions'));
    }

    public function json_data() {

        $string = '文字列';
        $number = 12345;
        $boolean = true;
        $array = ['太郎', '次郎', '三郎'];
        $object = [
            'key_1' => 'value_1',
            'key_2' => 'value_2',
            'key_3' => 'value_3',
        ];

        return [
            'string' => $string,
            'number' => $number,
            'boolean' => $boolean,
            'array' => $array,
            'object' => $object
        ];

    }

}
