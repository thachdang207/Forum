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
  <div class="container-fluid mb-5">
    <div class="row">
      <div class="col-12 col-md-12">
        <nav class="navbar navbar-dark bg-dark fixed-top">
          <a class="navbar-brand  text-light font-weight-bold ml-3">Forum</a>
          <div class='d-flex align-items-center'>
            <form class="form-inline">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <a href="http://" class="text-light ml-5">Logout</a>
          </div>
        </nav>
      </div>
    </div>
  </div>
  {{-- test --}}

  {{-- endtest --}}
  <div class="container mt-5 ">
    <div class="row">
      <div class="col-12 col-md-6 offset-3 col-md-6-mt-6">
        <ul class="list-unstyled">
          <?php $i=1;?>
          @foreach($posts as $post)
          <div class="border-bottom mt-1">
            <li class="ml-1">
              <div class="d-flex justify-content-between">
                <a href="{{ route('posts.show',$post->id) }}" class="text-primary">
                  <h5 class="mb-0">{{ $post->title }}</h5>
                </a>
                {{-- <form action="{{ route('posts.destroy',$post->id) }}" method="POST" class="">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger">Delete</button>
                </form> --}}
                @if(isset($_SESSION['uid']))
                @if($_SESSION['uid'=='adminm'])
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST" class="">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endif
                @endif
              </div>
              <a href="{{ route('categories.show',$post->category_id) }}" class="badge mt-2 badge-secondary
                  {{-- @if($i%3==1) badge-secondary
                  @endif --}}
                ">{{ $post->category_id->name }}</a>
              <p class="text-muted">{{ $post->description }}</p>
              <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                  <i class="fas fa-user mr-2"></i>
                  <a href="{{ route('posts.showPostsOfUser',$post->user_id)}}">
                    {{ $post->name }}
                  </a>
                </div>
                <div class="d-flex align-items-center">
                  <i class="far fa-comments">&nbsp</i>
                  {{ $post->count_comment }}
                </div>
              </div>
            </li>
          </div>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-6 offset-3">
          {{$posts->links("pagination::bootstrap-4")}}
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 offset-3 mb-5">
        <form action="{{ route('posts.create') }}" method="GET">
          <button type="submit" class="otherButton">Add post</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>