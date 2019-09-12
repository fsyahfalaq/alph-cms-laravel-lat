<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class StoreController extends Controller
{
    //
    public function index() {
        return view('store.main')
            ->with('posts', Post::orderBy('created_at', 'DESC')->get());
    }

    public function show($id) {
        $post = Post::find($id);
        // dd($post);
        // // show the view and pass the nerd to it
        return view('store.show')
            ->with('post', $post);
    }
    
}
