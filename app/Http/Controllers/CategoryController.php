<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Session;
use Validator;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = category::all();

        return view('category.main')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');
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

        $validator = validator::make($request->all(), [
            'name' => 'required|max:20:min:3'
        ]);

        if($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        // Create Category

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        Session::flash('category_create', 'New category is Created');
    
        return redirect('category/create');
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
        $categories = Category::findorfail($id);
        return view('category.edit')
            ->with('categories', $categories);

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
        $validator = validator::make($request->all(), [
            'name' => 'required|max:20:min:3'
        ]);

        if($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        // Create Category

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();

        Session::flash('category_update', 'Category is updated');
    
        return redirect('category');
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
        $categories = Category::find($id);
        $categories->delete();
        
        Session::flash('category_delete', 'Category is deleted');

        return redirect('category');
    }
}
