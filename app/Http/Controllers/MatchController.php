<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reaction;

class MatchController extends Controller
{
    public function store(Request $request)
    {
        Reaction::create([
            'from_user_id' => \Auth::id(),
            'to_user_id' => $request->input('to_user_id'),
            'status' => $request->input('status')
        ]);


        return view('post.entry');
    }

    public function index()
    {

        $reactions = Reaction::with('user')
        // ->where(
        //     'from_user_id', '=', \Auth::id(),
        //     'status','=','TRUE' 
        //     )
        ->get();

        // $reactions = Reaction::get();



        dd($reactions);

        return view('match.index', compact('reactions'));
    }
}
