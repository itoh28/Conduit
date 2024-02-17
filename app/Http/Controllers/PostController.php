<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $user = auth()->user();
        return view('post.index', compact('posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required | max:255',
            'summary' => 'required | max:1024',
            'body' => 'required | max:1024',
            'tags' => 'required | max:255'
        ]);
        // ユーザーがログインしているかどうかを確認
        if (auth()->check()) {
            $post = new Post();
            $post->title = $inputs['title'];
            $post->summary = $inputs['summary'];
            $post->body = $inputs['body'];
            // ユーザーがログインしている場合にのみユーザーIDを設定
            $post->user_id = auth()->user()->id;
            $post->save();

            $tagNames = explode(' ', $request->tags);

            foreach ($tagNames as $tagName) {
                // タグが存在しなければ作成し、すでに存在する場合はそのまま取得する
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                // 中間テーブルに関連付けを追加
                $post->tags()->attach($tag->id);
            }
        }

        return redirect()->route('post.create')->with('message', 'Created a post');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $inputs = $request->validate([
            'title' => 'required | max:255',
            'summary' => 'required | max:1024',
            'body' => 'required | max:1024',
            'tags' => 'required | max:255'
        ]);
        // ユーザーがログインしているかどうかを確認
        if (auth()->check()) {
            $post->title = $inputs['title'];
            $post->summary = $inputs['summary'];
            $post->body = $inputs['body'];
            $post->save();

            $tagNames = explode(' ', $request->tags);
            $post->tags()->detach();
            foreach ($tagNames as $tagName) {
                // タグが存在しなければ作成し、すでに存在する場合はそのまま取得する
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                // 中間テーブルに関連付けを追加
                $post->tags()->attach($tag->id);
            }
        }

        return redirect()->route('post.show', $post)->with('message', 'Post updated');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('message', 'Post deleted');
    }
}
