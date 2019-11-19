<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
class UserController extends Controller
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postsOfUser=User::join('posts', 'users.id', '=', 'posts.user_id')->where('posts.user_id','=',$id)
        ->select('users.name', 'posts.*')
        ->getQuery()
        ->get();
        foreach($postsOfUser as $postOfUser) {
            $count_comment=0;
            $post_id=$postOfUser->id;
            $count_comment=Post::Join('comments','posts.id','=','comments.post_id')->Where('comments.post_id','=',$postOfUser->id)->count();
            $categoryOfPost=Category::Where('id','=',$postOfUser->category_id)->first();
            $postOfUser->category=$categoryOfPost;
            $postOfUser->count_comment=$count_comment;
        }
        return view('posts/showPostsOfUser',['posts'=>$postsOfUser]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
