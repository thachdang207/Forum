
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
    <div class="row row-list-comment my-2 row-{{$comment->id}}" >
                <div class="col-8">
                    <p><i class="fas fa-user mr-2"></i><a href="{{ route('posts.showPostsOfUser',$comment->user_id)}}">
                        {{ $comment->name}} 
                      </a></p>
                    <div class="content">{!! $comment->content !!}</div>
                    <div class="items d-flex align-items-center mb-1"> 
                        <a href="#" class="mr-3 comment"><i class="far fa-comment comment"></i>Comment </a>
                        <a href="#"><i class="fas fa-exclamation mr-3"> Report</i>  </a>
                    @if(Auth::check()) 
                        @if(Auth::user()->isAdmin()||Auth::user()->id==$post->user_id||Auth::user()->id==$comment->user_id)
                            <a href="" class="mr-3 delete-comment" data-id="{{ $comment->id }}" data-token="{{ csrf_token() }}">
                                <i class="fas fa-trash mr-3"> Delete</i>
                            </a>
                        @endif
                    @endif
                    </div>
                </div>
                <div class="col-4 d-flex align-items-end justify-content-end">
                   <p> Create_At: {{$comment->created_at }}</p>
                </div>
            </div>  
        @endforeach
    </div>
    <div class="container container-add-comment">
        <div class="row row-comment p-0">
            <div class="col-12 p-0">
                @if(Auth::check())
                <form {{--method="POST"--}} action="{{--route('comments.store')--}}">
                    {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                    <div class="form-group">
                        <textarea class="form-control content-comment"name="content" aria-describedby="emailHelp" placeholder="Your comment"></textarea>
                    </div>
                    {{----}}
                        <input type="hidden" class="form-control post-id-comment" name="post_id"  value={{$post->id}} >
                        
                            <input type="hidden" class="form-control user-id-comment" name="user_id"  value={{Auth::user()->id}} >
                            <input type="hidden" class="form-control user-name-comment" name="user_name"  value={{Auth::user()->name}} >
                       
                    <button id="add-comment" class="" name="add">Add</button>
                </form>
                @else
                <form>
                    <div class="form-group">
                        <textarea class="form-control content-comment"name="content" aria-describedby="emailHelp" placeholder="Your comment"></textarea>
                    </div>
                    {{----}}
                        <input type="hidden" class="form-control post-id-comment" name="post_id"  value={{$post->id}} >
                        
                    <button id="add-comment-2" class="" name="add">Add</button>
                </form>
                @endif
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
        <script type="text/javascript">
        $(document).ready(function()
        {
            var user_id=0;
            var user_name="";
            
   
            $("#add-comment").click(function(e){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }   
                });
                e.preventDefault();
                var content = $("textarea[name=content]").val();
                $('textarea').val('');
                var post_id = $("input[name=post_id]").val();
                user_id = $("input[name=user_id]").val();
                user_name = $("input[name=user_name]").val();
                $.ajax({
                   type:'POST',
                   url:"{{route('comments.store')}}",
        
                   data:{content:content, post_id:post_id, user_id:user_id, user_name:user_name},
                    
                    dataType:'json',
                   success:function(data){
                        $('.container-comment').append(data.data);
                     // alert(data.success);
                   }
        
                });
            

            });
            $("#add-comment-2").click(function(e){
                $('.container-comment').append('<p clas="text-danger"> Vui long dang nhap tai khoan</p>');
            });
            $(".delete-comment").click(function(e){
                var id = $(this).data("id");
                var token = $(this).data("token");
                $(".row-"+id).hide();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }   
                });
                e.preventDefault();
                console.log(id);
                console.log(token);
                $.ajax({
                   type:'POST',
                   url:"/comments/"+id,
        
                   data:{id:id,
                    _token:token,
                    _method: 'DELETE',
                   },
                    
                    dataType:'json',
                   success:function(data){
                        
                   }
        
                });
            });
            $('.content-comment').click(function(){
                $('.content-comment').css('height','200px');
               
            });
            $('.content-comment').blur(function(){
                $('.content-comment').css('height','75px');
            });
        });
        </script>
</body>
</html>