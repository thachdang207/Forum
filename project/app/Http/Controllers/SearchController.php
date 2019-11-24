<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class SearchController extends Controller
{
    public function search(){
        return view('header');
    }
    public function autocomplete(Request $request)
    {
        $data = Post::select("title as name")->where("title","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);
        
    }
}
