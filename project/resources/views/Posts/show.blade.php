
@include('header')
    <!--Phong-->
    <div class="container container-content">
        <div class="row post-row">
            <div class="col-2 d-flex align-items-center">
                    <div class="avatar"></div>
            </div>
            <div class="col-2 d-flex ">
                <h5>{{ $user->name }}</h5>
            </div>     
            <div class="col-3 offset-5 d-flex  flex-column align-items-end ">
                <p>Join at: {{--$user->create_at--}}</p>
                <small>time</small>
                <small>Post</small>
            </div>      
            </div>
        <div class="row post-title">
            <div class="col-12 d-flex align-items-center">
                <h4 class="title">{{ $post->title }}</h4>
            </div>
        </div>
        <div class="row post-content">
            <div class="mx-3">{!! $post->content !!}</div>
        </div>
    </div>
    <div class="container container-comment mt-5">
        <div class="row">
            <div class="col-12">
                <h5>Comment:</h5>
            </div>
        </div>    
        @foreach($comments as $comment)
            <div class="row row-list-comment my-2">
                <div class="col-8">
                    <p><i class="fas fa-user mr-2"></i>{{ $user->name }}</p>
                    <div class="content">{!! $comment->content !!}</div>
                    <div class="items d-flex align-items-center mb-1">
                        <a href="#" class="mr-3"><i class="far fa-thumbs-up"></i>Like</a>
                        <a href="#" class="mr-3 comment"><i class="far fa-comment comment"></i> Comment</a>
                        <a href="#"><i class="fas fa-exclamation"></i> Report</a>
                    </div>
                </div>
            </div>  
        @endforeach
        <div class="row row-comment">
            <div class="col-12">
                <form method="POST" action="{{route('comments.store',$post->id)}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <textarea class="form-control" id="exampleInputEmail1" name="content" aria-describedby="emailHelp" placeholder="Your comment"></textarea>
                    </div>
                    {{----}}
                        <input type="hidden" class="form-control" name="post_id"  value={{$post->id}} >
                        <input type="hidden" class="form-control" name="user_id"  value={{$user->id}} >
                    <button type="submit" class="" name="add">Add</button>
                </form>
            </div>
        </div>
    </div>
<!--end--> 
<!--
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
-->
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
      <script>
            // Thay thế <textarea id="post_content"> với CKEditor
          //  CKEDITOR.replace( 'content' );// tham số là biến name của textarea
        </script>
</body>
</html>
