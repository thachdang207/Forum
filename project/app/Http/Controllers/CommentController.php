<?php
namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Http\Request;
use App\Post;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $post = Post::findOrFail($request->post_id);
        // //$user = Auth::user();
        // Comment::create([
        //     'content' => $request->content,
        //     'user_id' => 1,/////
        //     'post_id' => $post->id
        // ]);
        // return redirect()->route('posts.show',$post->id);
            //dd($request->ajax());
        if(!$request->ajax()){
            $output='';
            $comment= new Comment;
            $comment->content=$request->content;
            $comment->user_id=$request->user_id;
            $comment->post_id=$request->post_id;
            $comment->save();
            // $data=Comment::get();
            // foreach($data as $r){
            //     $output.='<div class="row row-list-comment my-2">'
            //     .'<div class="col-8">'.'<p><i class="fas fa-user mr-2"></i>'/*$user->name*/.'phong'.'</p>'.'<div class="content">'.$r->content.'</div>'.'<div class="items d-flex align-items-center mb-1">
            //     <a href="#" class="mr-3"><i class="far fa-thumbs-up"></i>Like</a>
            //     <a href="#" class="mr-3 comment"><i class="far fa-comment comment"></i> Comment</a>
            //             <a href="#"><i class="fas fa-exclamation"></i> Report</a>
            //         </div>
            //     </div>
            // </div>';
            // }
        }   
        $rs = array(
            //'data'=>$output,
            'msg' => 'Setting created successfully',
        );         
        // $data= array(
        //     'data'=>$output
        // );
        //echo json_encode($data);
        //return redirect()->route('posts.show',$post->id)->with('data',$output);
        //return redirect()->route('posts.index');
        return response()->json($rs);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $content=$request->content;
        $post_id= $request->post_id;
        $user_id= $request->user_id;
        $user_name= $request->user_name;
        $comment = new Comment;
        $comment->content=$content;
        $comment->post_id=$post_id;
        $comment->user_id=$user_id;
        $comment->save();
        $output="";
        //$data = Comment::get();
        if($user_id==0 &&$user_name=''){
            $output="error";
        }
        else{
        $output='
            <div class="row row-list-comment my-2">
                 <div class="col-8">
                     <p><i class="fas fa-user mr-2"></i><a href="{{ route(\'posts.showPostsOfUser\',$comment->user_id)}}">'.$user_name.'</a></p>
                     <div class="content">'.$content.'</div>
                     <div class="items d-flex align-items-center mb-1">
                         <a href="#" class="mr-3 comment"><i class="far fa-comment comment"></i> Comment</a>
                         <a href="#"><i class="fas fa-exclamation mr-3"> Report</i> </a>
                         <a href="" class="mr-3 delete-comment" data-id="{{ $comment->id }}" data-token="{{ csrf_token() }}">
                            <i class="fas fa-trash mr-3"> Delete</i>
                        </a>
                     </div>
                 </div>
                 <div class="col-4 d-flex align-items-end justify-content-end">
                   <p> Create_At: '.$comment->created_at.'</p>
                </div>
             </div>';
            }
            
        return response()->json([
            'data'=>$output
            ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        Comment::destroy($comment->id); 
        return ['status'=> true] ; 
    }
    public function DestroyComment( $id)
    {
        Comment::destroy($id); 
        return ['status'=> true] ; 
    }
}