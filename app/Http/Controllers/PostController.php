<?php

namespace App\Http\Controllers;

use App\Post;
use Session;
use App\Category;
use Illuminate\Http\Request;
use File;
use Validator;
use Redirect;

class PostController extends Controller
{
    //
    public function index()
    {
        //
        $posts = Post::all();

        return view('post.main')
            ->with('posts', $posts);
    }

    public function create() {
        $categories = array();

        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }
        
        return view('post.create')
            ->with('categories', $categories);
    }

    public function store(Request $request)
    {
        //

        $validator = validator::make($request->all(), [
            'category_id' => 'required|integer',
            'author' => 'required|min:2',
            'title' => 'required|min:3',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'short_desc' => 'required|min:10',
            'description' => 'required|min:50'
        ]);

        if($validator->fails()) {
            return redirect('post/create')
                ->withInput()
                ->withErrors($validator);
        }

        // Create Post
        $image = $request->file('image'); 
        if ($image == null) {
            $lokasifile = null;
          }
          else {
            $namafile = $request->file('image')->getClientOriginalName();
            $ext = strtolower($request->file('image')->getClientOriginalExtension());
            $lokasifile = '/photosProduct/'.$namafile;
          //cek file sudah ada
          if ($ext == "png" || $ext == "jpg") {
            $destinasi = public_path('/photosProduct');
            $proses = $request->file('image')->move($destinasi,$namafile);
          }
          else {
            return Redirect::back()->withErrors(['file tidak sesuai, tidak bisa diupload']);
          }
        }

        $post= new Post;    
        $post->category_id = $request->category_id;        
        $post->author = $request->author;
        $post->title = $request->title;
        $post->image = $lokasifile;
        $post->short_desc = $request->short_desc;
        $post->description = $request->description;
        $post->save();

        Session::flash('post_create', 'New post is Created');
    
        return redirect('post/create');
    }

    public function edit($id)
    {
        //
        $categories = array();

        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }

        $posts = Post::findorfail($id);
        return view('post.edit')
            ->with('posts', $posts)
            ->with('categories', $categories);


        
    }

    public function update(Request $request, $id)
    {
        //

        $validator = validator::make($request->all(), [
            'category_id' => 'required|integer',
            'author' => 'required|min:2',
            'title' => 'required|min:3',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'short_desc' => 'required|min:10',
            'description' => 'required|min:50'
        ]);

        $post = Post::find($id);

        if($validator->fails()) {
            return redirect('post/'.$post->id.'/edit')
                ->withInput()
                ->withErrors($validator);
        }

        // Create Post
        if ($request->file('image') != "") {
            $image = $request->file('image'); 
            if ($image == null) {
                $lokasifile = null;
            }
            else {
                $namafile = $request->file('image')->getClientOriginalName();
                $ext = $request->file('image')->getClientOriginalExtension();
                $lokasifile = '/photosProduct/'.$namafile;
                //cek file sudah ada
                if ($ext == "png" || $ext == "jpg") {
                    $destinasi = public_path('/photosProduct');
                    $proses = $request->file('image')->move($destinasi,$namafile);
                }
                else {
                    return Redirect::back()->withErrors(['file tidak sesuai, tidak bisa diupload']);
                    }
            }
        }
        
        $post= new Post;    
        $post->category_id = $request->category_id;        
        $post->author = $request->input('author');
        $post->title = $request->input('title');
        $post->image = $lokasifile;
        $post->short_desc = $request->input('short_desc');
        $post->description = $request->input('description');
        $post->save();

        Session::flash('post_update', 'Post is Updated');
    
        return redirect('post');
    }

    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $imageFile = ltrim($post->image, '/');
        File::delete($imageFile);
        $post->delete();
        
        Session::flash('post_delete', "Post is deleted");

        return redirect('post');
    }
}
