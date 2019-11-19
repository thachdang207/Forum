<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use App\Post;
use App\User;
class ReportController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = Post::findOrFail($request->post_id);
        Report::create([
            'content' => $request->content,
            'user_id' => 1,/////
            'post_id' => $report->id
        ]);
        return redirect()->route('posts.show', $report->id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Report $report
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
<<<<<<< HEAD
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
=======
        dd($report->post_id);
>>>>>>> da1f46e50742836c18b46cc17aaf68534a29977a
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Report $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Report $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Report $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
