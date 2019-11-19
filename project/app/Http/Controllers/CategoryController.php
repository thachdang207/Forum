<?php

namespace App\Http\Controllers;

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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $postsOfCategory=Category::Join('posts','categories.id','=','posts.category_id')->where('posts.category_id','=',$category->id)
        ->select('categories.name','posts.*')
        ->getQuery()->get();
        foreach($postsOfCategory as $postOfCategory) {
            $count_comment=0;
            $post_id=$postOfCategory->id;
            $count_comment=Post::Join('comments','posts.id','=','comments.post_id')->Where('comments.post_id','=',$postOfCategory->id)->count();

            $user_result=User::Where('id','=',$postOfCategory->user_id)->first();

            $postOfCategory->count_comment=$count_comment;
            $postOfCategory->userName=$user_result;
        }
        return view('categories/show',['posts'=>$postsOfCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
