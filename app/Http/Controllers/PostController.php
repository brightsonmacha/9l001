<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(
            ['auth']
        )->except([
            'index', 'show'
        ]);
    }

    public function index()
    {
        //
        //$posts  = DB::select('SELECT * FROM posts WHERE id = :id', [ 'id' => 2]); //parameterBinding
        // $posts  = DB::table('posts')
        //     ->get();


        // $posts =  Post::orderBy('id', 'desc')->take(3)->get();
        // $posts =  Post::orderBy('id', 'desc')->get();
        // $posts =  Post::where('id', '3')->get();
        // $posts =  Post::chunk(4, function ($posts) {
        //     foreach ($posts as $post) {
        //         return $post->title . "<br>";
        //     }
        // });

        // $posts =  Post::sum('id');
        $posts =  Post::orderBy('updated_at', 'desc')->paginate(4);


        //return view('posts.index')->with(['posts' => $posts]);
        return view('posts.index', ['posts' => $posts]);
    }


    public function create()
    {
        //
        return view('posts.create');
    }

    public function store(PostFormRequest $request)
    {
        //
        // $post = new Post();
        // $post->title = $request->title;
        // $post->body =  $request->body;

        // $post->save();

        // $this->validate(
        //     $request,
        //     [
        //         'title' => 'required|max:255|unique:posts',
        //         'body' => 'required',
        //         'image' => ['required', 'mimes:png,jpg,jepg', 'max:5048']
        //     ]
        // );

        // $request->validate([
        //         'title' => 'required|max:255|unique:posts',
        //         'body' => 'required',
        //         'image' => ['required', 'mimes:png,jpg,jepg', 'max:5048']
        //     ]
        // );

        $request->validated();

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'image_path' => $this->storeImage($request)
        ]);

        return redirect(route('posts.index'))->with('message', 'Post created successfully');
    }


    public function show($id)
    {
        //
        //$post  = DB::table('posts')->find($id);
        $post = Post::where('id', $id)->first();

        return view('posts.show')->with(['post' => $post]);
    }

    public function edit($id)
    {
        //
        //$post  = DB::table('posts')->find($id);
        $post = Post::where('id', $id)->first();

        return view('posts.edit')->with(['post' => $post]);
    }


    public function update(Request $request, $id)
    {
        //
        $this->validate(
            $request,
            [
                'title' => 'required|max:255|unique:posts,title,' . $id,
                'body' => 'required',
                'image' => ['mimes:png,jpg,jepg', 'max:5048']
            ]
        );

        //
        //Post::where('id', $id)->update($request->except('_token','_method'));

        if ($request->image != null) {
            Post::where('id', $id)->update([
                'title' => $request->title,
                'body' => $request->body,
                'image_path' =>  $this->storeImage($request)
            ]);
        } else {
            Post::where('id', $id)->update([
                'title' => $request->title,
                'body' => $request->body
            ]);
        }

        return redirect(route('posts.index'))->with('message', 'Post edited successfuly');
    }


    public function destroy($id)
    {
        //
        Post::destroy($id);
        return redirect(route('posts.index'))->with('message', 'Post deleted successfuly');
    }

    private function storeImage($request)
    {
        $nImage = uniqid() . '.' . $request->image->extension();

        return $request->image->move(public_path('images'), $nImage);
    }
}
