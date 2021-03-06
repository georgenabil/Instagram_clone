<?php

namespace App\Http\Controllers;



use App\Post;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public  function  index(){

        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts=Post::whereIn("user_id",$users)->with('user')->with('user.profile')->latest()->paginate(5);


        $NSuggestedUsers=$users->toArray();
        array_push($NSuggestedUsers,auth()->user()->id);
        $allusers = User::whereNotIn('id',$NSuggestedUsers)->with('profile')->get();

        return view('posts.index',compact('posts', 'allusers'));

    }

    public function create(){

        return view("posts.create");
    }
    public function store(){

        $data = request()->validate(
            ["caption"=>'required',
              'image'=>'required|image'
            ]
        );
        $imagePath = request('image')->store('uploads','public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption'=>$data['caption'],
            'image'=>$imagePath
        ]);

        return redirect('/profile/'.auth()->user()->id);

    }

    public  function show(Post $post ){

        return view('posts.show',compact('post'));
    }
    public  function delete(Post $post){
        $this->authorize('update',$post);
        $post->delete();
         return redirect('/profile/'.auth()->user()->id);
    }

}
