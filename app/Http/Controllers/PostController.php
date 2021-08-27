<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Post;

class PostController extends Controller
{
    //

    //testです
    //最初の画面
    public function start()
    {

        return view('start');
    }

    //投稿一覧を表示
    public function home()
    {

        $posts = Post::select('posts.*')
            ->where('user_id', '!=', \Auth::id())
            ->whereNull('deleted_at')
            ->orderBy('updated_at', 'DESC')
            ->get();



        return view('post.home', compact('posts'));
    }


    //投稿作成ページを表示
    public function create()
    {
        return view('post.create');
    }

    //投稿作成ページ
    public function store(Request $request)
    {
        $posts = $request->all();

        Post::insert([
            'content' => $posts['content'],
            'user_id' => \Auth::id(),
            'type' => $posts['type'],
            'game_name' => $posts['game_name'],
            'conditions' => $posts['conditions'],
            'others' => $posts['others']

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


        return view('post.list',compact('posts'));
    }

    public function edit($id)
    {
        $edit_post = Post::find($id);
        if(is_null($edit_post)){
            \Session::flash('err_msg','投稿データがありません。');
            return redirect(route('list'));
        }

        return view('post.edit',compact('edit_post'));
    }

    public function update(Request $request)
    {
        $posts = $request->all();

        Post::where('id',$posts['id'])->update([
            'type' => $posts['type'],
            'game_name' => $posts['game_name'],
            'conditions' => $posts['conditions'],
            'content' => $posts['content'],
            'others' => $posts['others'],
            'updated_at' => date("Y-m-d H:i:s",time())]);

        return redirect(route('home'));
    }
    public function destroy(Request $request)
    {
        $posts = $request->all();

        Post::where('id',$posts['id'])->update([
            'deleted_at' => date("Y-m-d H:i:s",time())]);

        return redirect(route('home'));
    }
}
