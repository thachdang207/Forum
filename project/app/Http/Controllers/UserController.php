<?php

namespace App\Http\Controllers;


use App\Role;
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
        $users = User::get();
        return view('users/show', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('users/add', ["roles" => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::insert(['name' => $request->name, 'email' => $request->email,
            'password' => $request->password, 'role_id' => $request->role_id]);
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get();
        return view('users/edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::find($id)->update(['name' => $request->name, 'email' => $request->email, "role_id" => $request->role_id]);
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect(route('users.index'));
    }
}
