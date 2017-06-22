<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    // バリデーションのルール
    public $validateRules = [
        'title' => 'required',
        'body' => 'max:500'
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $posts = Post::orderBy('id', 'desc')->paginate(20);
        $posts = Post::with('category', 'tags')->orderBy('id', 'desc')->paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->toArray();
        $tags = Tag::pluck('title', 'id')->toArray();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->validateRules);

        $tags = $request->input('tag_id', []);
        unset($request['tag_id']);

        $post = Post::create($request->all());
        // tagsの保存
        $post->tags()->attach($tags);

        \Session::flash('flash_message', '記事を作成しました。');
        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $post = Post::find($id);
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $categories = Category::pluck('title', 'id')->toArray();
        $tags = Tag::pluck('title', 'id')->toArray();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->validateRules);
        $post = Post::findOrFail($id);

        // tagもupdate
        $post->tags()->sync($request->input('tag_id', []));

        unset($request['tag_id']);
        $post->update($request->all());


        \Session::flash('flash_message', '記事を更新しました。');
        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        $post->delete($id);

        \Session::flash('flash_message', '記事を削除しました。');

        return redirect('admin/posts');
    }
}
