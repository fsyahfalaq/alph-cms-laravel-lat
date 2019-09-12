<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('article.main')
            ->with('posts', Post::orderBy('created_at', 'DESC')->paginate(5))
            ->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        return view('article.show')
            ->with('post', $post)
            ->with('categories', Category::all());
    }

    public function category($id) {
        $categories = Category::all();
        $post = DB::table('posts')->where('category_id','=',$id)->paginate(5);
       
        return view('article/category')
            ->with('categories', $categories)
            ->with('posts', $post);
    }

    public function search(Request $request) {

        $keyword = $request->input('keyword');
        $categories = Category::all();
 
        return view('article.search')
            ->with('posts', Post::where('title', 'LIKE', '%'. $keyword . '%')->paginate(5))
            ->with('keyword', $keyword)
            ->with('categories', $categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function getDisplay($id) {

    //     return view('article/display')
    //         ->with('posts', Post::find($id));
    // }
}
