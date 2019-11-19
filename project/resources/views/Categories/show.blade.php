

    @include('header')
    {{----phong----}}

    <div class="container container-category">
        <div class="row">
            <div class="col-10 d-flex align-items-center">
                <p><a href="#"> Category: {{ $posts[0]->name }}</a></p>          
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
                {{--<small> Category: <a href="{{ route('categories.show',$post->category_id) }}" class="badge mt-2 badge-secondary">{{ $post->category_id->name }}</a></small>   --}}     
            </div>
            <div class="col-2 ">
                <h6>Last post</h6>
                <small>By</small> <span class="admin"><a href="{{ route('posts.showPostsOfUser',$post->user_id)}}">
                    {{ $post->user_id->name }}
                  </a></span>
                <p>Time.....</p>
            </div>
        </div>
        @endforeach
          
    </div>
    
 