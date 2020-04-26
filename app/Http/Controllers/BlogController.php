<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wink\WinkPost;

class BlogController extends Controller
{
    public function index()
    {
        $posts = WinkPost::with('tags')
            ->live()
            ->orderBy('publish_date', 'DESC')
            ->simplePaginate(12);

        return view('welcome', [
            'posts' => $posts
        ]);
    }

    public function post($slug){
        $post = WinkPost::live()->whereSlug($slug)->firstOrFail();
        return view('post', [
            'post' => $post
        ]);
    }

    public function search(Request $request)
    {
        $q = $request->get ( 'q' );
        $posts = WinkPost::where('title','LIKE','%'.$q.'%')->get();
        if(count($posts) > 0)
            return view('result', compact('posts'))->withQuery ( $q );
        else 
            return back()->with('error', 'No Blog found. Try to search again !');
    }

    // API
    public function allPost()
    {
        $posts = WinkPost::with('tags')
            ->live()
            ->orderBy('publish_date', 'DESC')
            ->simplePaginate(12);
        return response()->json($posts);
    }
}
