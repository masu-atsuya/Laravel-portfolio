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
            'user_id' => \Auth::id(),
            'post_id' => $request->input('post_id'),
            'status' => $request->input('status')
        ]);


        return view('post.entry');
    }

    public function index()
    {

        $reactions = Reaction::with('post','user')
 
        ->get();

        dd($reactions);



        return view('match.index', compact('reactions'));
    }
}
