<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Post;
use App\Models\Game;
use App\Models\Type;
use App\Models\Condition;

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

        $posts = Post::with('game','type','condition')
            ->where('user_id', '=', \Auth::id())
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
    public function store(Request $request)
    {
        $posts = $request->all();
        $image = $request->file('image');
        // dd($image);
        // 画像がアップロードされていれば、storageに保存
        if ($request->hasFile('image')) {
            $path = \Storage::put('/public', $image);
            $path = explode('/', $path);
        } else {
            $path = null;
        }
        Post::insert([
            'user_id' => \Auth::id(),
            'title' => $posts['title'],
            'game_id' => $posts['game_id'],
            'type_id' => $posts['type_id'],
            'content' => $posts['content'],
            'contact' => $posts['contact'],
            'condition_id' => $posts['condition_id'],
            'image' => $path[1],

        ]);



        return redirect(route('home'));
    }

    //自分の投稿を編集
    public function list()
    {
        $posts = Post::select('posts.*')
            ->where('user_id', '=', \Auth::id())
            ->whereNull('deleted_at')
            ->orderBy('updated_at', 'DESC')
            ->get();


        return view('post.list', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            \Session::flash('err_msg', '投稿データがありません。');
            return redirect(route('home'));
        }

        return view('post.show', compact('post'));
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
