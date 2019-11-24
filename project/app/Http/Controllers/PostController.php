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
    public function searchPosts()
    {
        $key=$_GET['key'];
        //$orders = Post::where('title', 'like', '%' . $key . '%')->get();
        $postsOfCategory=Category::Join('posts','categories.id','=','posts.category_id')->where('title', 'like', '%' . $key . '%')
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
        return view('searches/search',['posts'=>$postsOfCategory]);
    }
    public function index()
    {
        // $result = User::join('posts', 'users.id', '=', 'posts.user_id')
        // ->select('users.name', 'posts.*')
        // ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
        // ->get();
        $posts=User::join('posts', 'users.id', '=', 'posts.user_id')
        ->select('users.name', 'posts.*')->selectSub(function ($query) {
            $query->selectRaw('0');
        }, 'count_report')->orderBy('updated_at', 'desc')
        ->getQuery()->paginate(3);
        foreach($posts as $post) {
            $count_comment=0;
            $count_report=0;
            $post_id=$post->id;
            $count_comment=Post::Join('comments','posts.id','=','comments.post_id')->Where('comments.post_id','=',$post->id)->get()->count();
            $count_report=Post::Join('reports','posts.id','=','reports.post_id')->Where('reports.post_id','=',$post->id)->get()->count();
            $category_post=Category::Where('id','=',$post->category_id)->first();
            $post->count_report=$count_report;
            $post->count_comment=$count_comment;
            $post->category_id=$category_post;
        }
        $categories=Category::Get();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::GET();
        return view('posts/create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = Category::GET();
        //dd(count($result));
        if (isset($_POST['otherCategory']) && !empty($_POST['otherCategory'])) {

            Category::insert([
                "name" => $_POST['otherCategory'],
                "created_at" => now(),
                "updated_at" => now(),
            ]);
            Post::insert(
                [
                    "title" => $_POST['title'],
                    "description" => $_POST['description'],
                    "content" => $_POST['content'],
                    "category_id" => count($result) + 1,
                    // "user_id"=>$_SESSION['uid'],
                    "user_id" => "12",
                    "created_at" => now(),
                    "updated_at" => now(),
                ]
            );
        } else {
            Post::insert(
                [
                    "title" => $_POST['title'],
                    "description" => $_POST['description'],
                    "content" => $_POST['content'],
                    "category_id" => $_POST['category_id'],
                    // "user_id"=>$_SESSION['uid'],
                    "user_id" => "12",
                    "created_at" => now(),
                    "updated_at" => now(),
                ]
            );
        }
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user_id=$post->user_id;
        $post_id=$post->id;
        $category_result=Category::Where('id','=',$post->category_id)->first();

        $post_result = Post::Where('id', '=', $post_id)->first();
        $user_result = User::Where('id', '=', $post->user_id)->first();
        $posts_result = User::join('posts', 'users.id', '=', 'posts.user_id')
        ->select('users.name', 'posts.*')->where('posts.category_id','=',$post->category_id)->where('posts.id','!=',$post->id)
        ->getQuery()
        ->get();
        // $comments_result = User::join('comments','comments.user_id','=','users.id')->where('comments.post_id','=',$post_id)
        // ->select('comments.id','comments.content','users.name')
        // ->getQuery()
        // ->orderBy('comments.id', 'desc')
        // ->get();
        $comments_result = Comment::join('users','comments.user_id','=','users.id')->where('comments.post_id','=',$post_id)
        ->select('comments.id','comments.content','users.name')
        ->getQuery()
        ->orderBy('comments.id', 'desc')
        ->get();
        //dd($comments_result);
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
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }
    public function showReportsOfPost($id){
        $reportsOfPost=Post::join('reports', 'posts.id', '=', 'reports.post_id')->where('reports.post_id','=',$id)
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->select('posts.*','reports.content','users.name','reports.user_id')
        ->getQuery()
        ->get();
        foreach($reportsOfPost as $reportOfPost) {
            $name='';
            $name=User::Where('users.id','=',$reportOfPost->user_id)->first();
            $reportOfPost->user_id=$name;
        }
        return view('posts/showReportsOfPost',['reportsOfPost'=>$reportsOfPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Comment::destroy()
        // $post1 = Post::find($post->id);
        // $post1->comments()->detach();
        $post->foreign('post_id')
            ->references('id')->on('posts')
            ->onDelete('cascade');
        // POST::destroy($post->id);
        return redirect()->route('posts.index');
    }

}
