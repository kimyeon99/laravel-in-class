<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDO;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $posts = Post::orderBy('created_at', 'desc')->get();
        // 모델에 있는 likes를 post 객체에 담는다.(함수 호출 안 해도 됨)
        $posts = Post::latest()->paginate(10);
        // dd($posts);

        return view('bbs/index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bbs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'image',
        ]);

        $fileName = null;

        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs(
                'public/images/',
                $fileName
            );
        }
        // strpos, strrpos
        $input = array_merge($request->all(), ["user_id" => Auth::user()->id]);

        if ($fileName) {
            $input = array_merge($input, ['image' => $fileName]);
        }

        Post::create($input);
        return redirect()->route('posts.index', ['posts' => Post::all()])->with('success', 'true');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('likes')->find($id);
        return view('bbs.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('bbs/edit', ['post' => Post::find($id)]);
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
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'image',
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;


        if ($request->image) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            if ($post->image) {
                Storage::delete('public/images/' . $post->image);
            }
            $request->image->storeAs(
                'public/images/',
                $fileName
            );
        }

        // 새로운 이미지 파일이 있을 경우 원래 이미지 파일 삭제하고 추가하기 할 차례

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->image) {
            Storage::delete('public/images/' . $post->image);
        }
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function deleteImage($id)
    {
        $post = Post::find($id);
        Storage::delete('public/images/' . $post->image);
        $post->image = null;
        $post->image->save();
        return redirect()->route('posts.edit', ['post' => $id]);
    }
}
