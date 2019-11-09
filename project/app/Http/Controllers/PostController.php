<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Comment;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $result = User::join('posts', 'users.id', '=', 'posts.user_id')
        // ->select('users.name', 'posts.*')
        // ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
        // ->get();
        $results=User::join('posts', 'users.id', '=', 'posts.user_id')
        ->select('users.name', 'posts.*','user_id as count_comment')
        ->getQuery()
        ->get();
        foreach($results as $result) {
            $count_comment=0;
            $post_id=$result->id;
            $count_comment=Post::Join('comments','posts.id','=','comments.post_id')->Where('comments.post_id','=',$result->id)->count();

            $category_result=Category::Where('id','=',$result->category_id)->first();

            $result->count_comment=$count_comment;
            $result->category_id=$category_result;
        }
        $categories=Category::Get();
        return view('posts/index',['posts'=>$results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::GET();
        return view('posts/create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result=Category::GET();
        //dd(count($result));
        if(isset($_POST['otherCategory'])&& !empty($_POST['otherCategory'])){

            Category::insert([
                "name"=>$_POST['otherCategory'],
                "created_at"=>now(),
                "updated_at"=>now(),
            ]);
            Post::insert(
                [
                    "title"=>$_POST['title'],
                    "description"=>$_POST['description'],
                    "content"=>$_POST['content'],
                    "category_id"=>count($result)+1,
                    // "user_id"=>$_SESSION['uid'],
                    "user_id"=>"12",
                    "created_at"=>now(),
                    "updated_at"=>now(),
                ]
            );
        }
        else{
            Post::insert(
                [
                    "title"=>$_POST['title'],
                    "description"=>$_POST['description'],
                    "content"=>$_POST['content'],
                    "category_id"=>$_POST['category_id'],
                    // "user_id"=>$_SESSION['uid'],
                    "user_id"=>"12",
                    "created_at"=>now(),
                    "updated_at"=>now(),
                ]
            );
        }
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user_id=$post->user_id;
        $post_id=$post->id;
        $category_result=Category::Where('id','=',$post->category_id)->first();

        $post_result = Post::Where('id','=',$post_id)->first();
        $user_result=User::Where('id','=',$post->user_id)->first();
        $posts_result = User::join('posts', 'users.id', '=', 'posts.user_id')
        ->select('users.name', 'posts.*')->where('posts.category_id','=',$post->category_id)->where('posts.id','!=',$post->id)
        ->getQuery()
        ->get();
        $comments_result = User::join('comments','comments.user_id','=','users.id')->where('comments.post_id','=',$post_id)->select('comments.content','users.name')
        ->getQuery()
        ->get();
        // dd($comments_result);
        return view('posts/show',['post'=>$post_result,'user'=>$user_result,'category'=>$category_result,'posts'=>$posts_result,'comments'=>$comments_result]);
    }
    public function showPostsOfUser($id){
        $postsOfUser=User::join('posts', 'users.id', '=', 'posts.user_id')->where('posts.user_id','=',$id)
        ->select('users.name', 'posts.*','user_id as count_comment')
        ->getQuery()
        ->get();
        foreach($postsOfUser as $postOfUser) {
            $count_comment=0;
            $post_id=$postOfUser->id;
            $count_comment=Post::Join('comments','posts.id','=','comments.post_id')->Where('comments.post_id','=',$postOfUser->id)->count();
            $postOfUser->count_comment=$count_comment;
        }
        return view('posts/showPostsOfUser',['posts'=>$postsOfUser]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Comment::destroy()
        // $post1 = Post::find($post->id);
        // $post1->comments()->detach();
        POST::destroy($post->id);
        return redirect()->route('posts.index');
    }
}
