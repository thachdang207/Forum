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
    <div class="container mt-5">
        <div class="row d-flex">
            <div class="col-12 col-md-8 col-sm-12">
                <h3>{{ $post->title }}</h3>
                <span class="badge badge-success mb-5">{{ $category->name }}</span>
                <p>{{ $post->content }}</p>
                <div class="d-flex justify-content-end">
                    {{-- <p>by <a href="{{ $user->id }}">{{ $user->name }}</a></p> --}}
                    <p>by <a href="#">{{ $user->name }}</a></p> 
                </div>
                <hr>
                <div class="ml-3">
                    <h3 class=""><u>Comments</u></h3>
                    <ul class="list-unstyled">
                        @foreach($comments as $comment)
                            <div class="border-bottom mt-1">
                                <li class="ml-1">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-user-edit mr-2"></i>
                                        <a href="#"><b>{{ $comment->name }}</b></a>
                                    </div>
                                    <p class="ml-4 mb-0">{{ $comment->content }}</p>
                                    <div class="ml-4">
                                        <div class="d-flex align-items-center mb-1">
                                            <a href="#" class="mr-3"><i class="far fa-thumbs-up"> Like</i></a>
                                            <a href="#" class="mr-3 comment"><i class="far fa-comment comment"></i> Comment</a>
                                            <a href="#"><i class="fas fa-exclamation"></i> Report</a>
                                        </div>
                                        <div id="" style="display:none" class="textComment">
                                            <br>
                                            <form action="">
                                                <textarea name="comment" id="" cols="90" rows="2"></textarea>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-0 col-md-4">
                    {{-- <h3 class="">{{ $category->name }}</h3> --}}
                    <h3>Bài viết liên quan đến Category</h3>
                    <ul class="list-unstyled">
                            @foreach($posts as $post)
                            <div class="border-bottom mt-1">
                                <li class="ml-1">
                                    <a href="{{ route('posts.show',$post->id) }}" class="text-primary">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                    </a>
                                    <p class="text-muted">{{ $post->description }}</p>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-user mr-2"></i>
                                        <a href="#">
                                                {{ $post->name }}
                                        </a>
                                    </div>
                                </li>
                            </div>
                            @endforeach
                    </ul>
            </div>
        </div>
    </div>
    <script>
        var i=0;
            $(document).ready(function()
                {
                    $(".comment").click(function(){
                        if(i==0){
                            $(".textComment").css("display", "flex");
                            i=1;
                        }
                        else{
                            $(".textComment").css("display", "none");
                            i=0;
                        }
                    });
                });
    </script>
</body>
</html>
