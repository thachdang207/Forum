
@include('header')
    <!--Phong-->
    
    <div class="container container-content">
        <div class="row post-row">
            <div class="col-2 d-flex align-items-center">
                    <div class="avatar"></div>
            </div>
            <div class="col-2 d-flex ">
                <h5><a href="{{ route('posts.showPostsOfUser',$post->user_id)}}">
                        {{ $user->name }}
                      </a>{{-- $user->name --}}</h5>
                
            </div>     
            <div class="col-3 offset-5 d-flex  flex-column align-items-end ">
                <p>Post at: {{ $post->created_at}}</p>
                {{--  <small>time</small>
                <small>Post</small>  --}}
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

      {{-- comment --}}
    <div class="container container-comment mt-5">
        <div class="row">
            <div class="col-12">
                <h5>Comment:</h5>
            </div>
        </div>    
        @foreach($comments as $comment)
            <div class="row row-list-comment my-2">
                <div class="col-8">
                    <p><i class="fas fa-user mr-2"></i><a href="{{ route('posts.showPostsOfUser',$post->user_id)}}">
                        {{ $comment->name}} {{ $user->name }}
                      </a></p>
                    <div class="content">{!! $comment->content !!}</div>
                    <div class="items d-flex align-items-center mb-1">
                        {{-- <a href="#" class="mr-3"><i class="far fa-thumbs-up"></i>Like</a> --}}
                        <a href="#" class="mr-3 comment"><i class="far fa-comment comment"></i> Comment</a>
                        <a href="#"><i class="fas fa-exclamation"></i> Report </a>
                    </div>
                </div>
            </div>  
        @endforeach
        <div class="row row-comment">
            <div class="col-12">
                <form {{--method="POST"--}} action="{{--route('comments.store')--}}">
                    {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                    <div class="form-group">
                        <textarea class="form-control content-comment"name="content" aria-describedby="emailHelp" placeholder="Your comment"></textarea>
                    </div>
                    {{----}}
                        <input type="hidden" class="form-control post-id-comment" name="post_id"  value={{$post->id}} >
                        @if(Auth::check())
                            <input type="hidden" class="form-control user-id-comment" name="user_id"  value={{Auth::user()->id}} >
                        @endif
                    <button id="add-comment" class="" name="add">Add</button>
                </form>
            </div>
        </div>
    </div>

    {{-- <script>
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
    </script> --}}
        <script src="{{--asset('css/phong/jquery.js')--}}"></script>
        <script>
            $(document).ready(function(){
                $("#add-comment").click(function(e){
                    e.preventDefault();
                    var content=$(".content-comment").val();
                    var post_id=$(".post-id-comment").val();
                    var user_id=$(".user-id-comment").val();
                    console.log(content);
                    console.log(post_id);
                    console.log(user_id);
                    //$.ajaxSetup({
                    //    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                    //    });
                    $.ajax({
                        type:"POST",
                        url:"/test",
                        data: {
                             _token: '{!! csrf_field() !!}',
                             content:content,
                             post_id:post_id,
                             user_id:user_id
                         },
                        dataType:'json',
                        async:true,
                        success:function(data){
                            $(".container-comment").append(rs.msg);
                        }
                    });
                    
                });
            });
         </script>
</body>
</html>