<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostCreateRequest;

use Illuminate\Http\Request;


use App\Models\Post;
use App\Models\Game;
use App\Models\Type;
use App\Models\Condition;
use App\Models\Message;
use App\Models\User;
use App\Models\Reaction;

class PostController extends Controller
{
    //


    //最初の画面
    public function top()
    {

        return view('top');
    }

    //投稿一覧を表示
    public function home()
    {
        $exists = Reaction::where('from_user_id',\Auth::id())
        ->exists();

        
        if($exists) {
            
            $actions = Reaction::select('post_id')
            ->where('from_user_id',\Auth::id())
            ->get();
            
            $posts = Post::with(['user' => function ($query) {
                $query->with('profile');
            }])
                ->with('game', 'type', 'condition')
                ->where(function($data) use($actions){
                    foreach($actions as $action) {
                        $data->where('id','!=',$action->post_id);
                    };
                })
                ->whereNull('deleted_at')
                ->orderBy('updated_at', 'DESC')
                ->get();
            return view('post.home', compact('posts'));

        }
        $posts = Post::with(['user' => function ($query) {
            $query->with('profile');
        }])
            ->with('game', 'type', 'condition')
            ->where('user_id', '!=', \Auth::id())
            ->whereNull('deleted_at')
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('post.home', compact('posts'));
    }


    //投稿作成ページを表示
    public function create()
    {
        $games = Game::all();
        $types = Type::all();
        $conditions = Condition::all();


        return view('post.create', compact('games', 'types', 'conditions'));
    }

    //投稿作成ページ
    public function store(PostCreateRequest $request)
    {

        $posts = $request->all();
        Post::insert([
            'user_id' => \Auth::id(),
            'title' => $posts['title'],
            'game_id' => $posts['game_id'],
            'type_id' => $posts['type_id'],
            'content' => $posts['content'],
            'contact' => $posts['contact'],
            'condition_id' => $posts['condition_id'],
        ]);



        \Session::flash('success', '投稿しました');
        return redirect(route('home'));
    }

    public function show($id)
    {
        $post = Post::with(['user' => function ($query) {
            $query->with('profile');
        }])
            ->with('game', 'type', 'condition')
            ->whereNull('deleted_at')
            ->orderBy('updated_at', 'DESC')
            ->find($id);
            
            $user_id = Post::where('user_id', '=', \Auth::id())
            ->where('id',$id)
            ->exists();

        if (is_null($post)) {
            \Session::flash('err_msg', '投稿データがありません。');
            return redirect(route('home'));
        }
        return view('post.show', compact('post','user_id'));
    }



    public function matching()
    {

        return view('post.matching');
    }

    public function chat($id)
    {
        $messages = Message::all();
        return view('post.chat', compact('messages'));
    }

    public function update(Request $request)
    {
        $posts = $request->all();

        Post::where('id', $posts['id'])->update([
            'type' => $posts['type'],
            'game_name' => $posts['game_name'],
            'conditions' => $posts['conditions'],
            'content' => $posts['content'],
            'others' => $posts['others'],
            'updated_at' => date("Y-m-d H:i:s", time())
        ]);

        return redirect(route('home'));
    }
    public function destroy(Request $request)
    {
        $posts = $request->all();

        Post::where('id', $posts['id'])->update([
            'deleted_at' => date("Y-m-d H:i:s", time())
        ]);

        return redirect(route('home'));
    }
}
