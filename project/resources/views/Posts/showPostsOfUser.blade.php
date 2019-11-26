<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

  @include('header')

  
  <div class="container container-category">
      <div class="row">
          <div class="col-10 d-flex align-items-center">
              <p><a href="#"> User: {{$posts[0]->name }}</a></p>          
          </div>
          <div class="col-2 d-flex align-items-center">
              <p>Last post</p>
          </div>
      </div>
      @foreach($posts as $post)
      <div class="row row-post">
          <div class="col-1 d-flex align-items-center">
              <div class="avatar"></div>
          </div>
          <div class="col-9 ">
              <h6 class="title"> <a href="{{route('posts.show',$post->id) }}">{{ $post->title }}</a> </h6>
              
              <p>{{ $post->description }}</p>  
              <small><i class="far fa-comments">&nbsp</i>{{ $post->count_comment }}</small>
              <small> Category: <a href="{{ route('categories.show',$post->category_id) }}" class="badge mt-2 badge-secondary">{{$post->category_id->name}} </a></small>       
          </div>
          <div class="col-2 ">
              <h6>Last post</h6>
              <small>By</small> <span class="admin"><a href="{{ route('posts.showPostsOfUser',$post->user_id)}}">
                  {{ $post->name }}
                </a></span>
              <p>Time.....</p>
          </div>
      </div>
      @endforeach
        
  </div>

</body>
</html>