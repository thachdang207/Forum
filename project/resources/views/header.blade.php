<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="{{asset('css/phong/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/phong/style1.css')}}">
    <link rel="stylesheet" href="{{asset('css/phong/style-post.css')}}">
    <link rel="stylesheet" href="{{asset('css/phong/style-login.css')}}">
  </head>
  <body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="{{asset('css/phong/login.js')}}"></script>
        
        <div class="container header">
            <div class="row">
                <div class="col-12 p-0 bg-green" >
                    <nav class="navbar navbar-expand-lg w-100 m-0 p-0">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link h-100" href="{{route('posts.index')}}"><i class="fas fa-home h-100"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('posts.index')}}
                                    "><i class="fas fa-comment nav-link "></i>Forum</a>
                                </li>
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle h-100" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-user-alt nav-link"></i>All Member 
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#
                                    ">Admin</a>
                                    <a class="dropdown-item" href="#">Member</a>
                                    <a class="dropdown-item" href="#">3</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row row-2">
                <div class="col-3 m-0 p-0">
                    <ul class="d-flex list">
                        <li>
                            <a class="" href="#"><i class="fas fa-search mr-1"></i>Search</a>
                        </li>
                        @if(Auth::check())
                            @if (Auth::user()->isAdmin())
                            <li>
                                <a class="" href="#">Hi Admin:{{Auth::user()->name}}</a>
                            </li>
                            <li>
                                <a class="" href="/logout"><i class="fas fa-sign-in-alt"></i>Logout</a>
                            </li>
                            @endif
                            @if (Auth::user()->isUser())
                            <li>
                                <a class="" href="#">Hi User:{{Auth::user()->name}}</a>
                            </li>
                            <li>
                                <a class="" href="/logout"><i class="fas fa-sign-in-alt"></i>Logout</a>
                            </li>
                            @endif
                        @endif
                        @if(!Auth::check())
                            <li>
                                <a class="" href="/login"><i class="fas fa-sign-in-alt"></i>Login</a>
                            </li>
                            <li>
                                <a class="" href="/register"><i class="fas fa-sign-in-alt"></i>Register</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="col-9 d-flex justify-content-end align-items-center">
                    <form class=" ">
                        <input class="" type="search" placeholder="Search" aria-label="Search">
                        <button class=""type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="row bg-white">
            <a href="{{route('posts.index')}}"><i class="fas fa-home"></i> Home</a>
            </div>
        </div>

  
