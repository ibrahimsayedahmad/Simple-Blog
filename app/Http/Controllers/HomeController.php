<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    public function index()
    {
        $posts=Post::query()->withoutGlobalScope('userposts')->get();
        return view('welcome',compact('posts'));
    }

    public function dashboard()
    {
        if(auth()->check())
        {
            $posts=Post::all();
            return view('dashboard',compact('posts'));
        }
        else {
            return redirect('login');
        }
    }

    public function add()
    {
        $this->authorize('add');
        return view('posts.add');
    }

    public function store(Request $request)
    {
        $this->authorize('add');
        $validated=$request->validate(
            [
                'title'=>'required'
            ],
            [
                'title'=>'Title is required'
            ]);

        $post=new Post();
        $post->title=$request->title;
        $post->description=$request->description;
        $post->user_id=auth()->id();
        $post->publication_date=$request->publicationdate;
        $post->save();

        return redirect()->route('dashboard');
    }
    public function import(Request $request)
    {
        $this->authorize('import');
        $users=User::all();
        return view('posts.import',compact('users'));
    }

    public function saveimport(Request $request)
    {
        $this->authorize('import');
        $validated=$request->validate(
            [
                'api'=>'required'
            ],
            [
                'api'=>'API is required'
            ]);
        $api=$request->api;
        $userid=$request->userid;
        $checkuser=User::query()->find($userid);
        if(!$checkuser)
        {
            $userid=auth()->id();
        }
        $postapi=Http::get($api);
        if($postapi->successful())
        {
            $result=json_decode($postapi->body());
            if(json_last_error()==JSON_ERROR_NONE)
            {
                foreach ($result->data as $post)
                {
                    $newpost=new Post();
                    $newpost->title=$post->title;
                    $newpost->description=$post->description;
                    $newpost->user_id=$userid;
                    $newpost->publication_date=$post->publication_date;
                    $newpost->save();
                }
            }
            else {
                $redirect=redirect()->back();
                return $redirect->withErrors(json_last_error_msg());
            }
        }
        else {
            $redirect=redirect()->back();
            return $redirect->withErrors("Can not retrieve data");
        }
        return redirect()->route('dashboard');
    }
}
