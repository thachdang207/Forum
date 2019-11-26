@include('header')
<!--phong-->

<div class="container container-body1">
  <div class="row">
    <div class="col-10 d-flex align-items-center">
      <p>Forum</p>
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
    <div class=" col-8 ">
      <h6 class="title"> <a href="{{route('posts.show',$post->id) }}">{{ $post->title }}</a> </h6>
      <p>{{ $post->description }}</p>
      <small> Category: <a href="{{ route('categories.show',$post->category_id) }}"
          class="badge mt-2 badge-secondary">{{ $post->category_id->name }}</a></small>
      <br>
      <small><i class="far fa-comments">&nbsp</i> {{ $post->count_comment }}</small>
    </div>
    <div class="col-1 flex-column justify-content-between">
      @if(Auth::check())
        @if(Auth::user()->isAdmin())
        <form action="{{ route('posts.destroy',$post->id) }}" method="POST" class="mb-5">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        @endif
      @endif

      @if(Auth::check())
        @if(Auth::user()->isAdmin() && $post->count_report > 0)
            <a href="{{ route('reports.show',$post->id) }}" class="text-danger">
              <i class="fas fa-exclamation-triangle"></i>
              {{ $post->count_report }}
            </a>
        @endif
      @endif
      </div>
    <div class="col-2 ">
      <h6>Last post</h6>
    <small>By</small>a <span class="admin"><a href="{{route('posts.showPostsOfUser',$post->user_id)}}">{{$post->name}}</a></span>
      <p>{{$post->created_at}}</p>
    </div>
  </div>
  @endforeach
</div>

<div class="container container-category">
  <div class="row">
    <div class="col-10 d-flex align-items-center">
      <p><a href="#"> Category: </a></p>
    </div>
    <div class="col-2 d-flex align-items-center">
      <p>Last post</p>
    </div>
  </div>

  <div class="row row-post">
    <div class="col-1 d-flex align-items-center">
      <div class="avatar"></div>
    </div>
    <div class="col-9">
      <h6 class="title"> <a href="{{route('posts.show',$post->id) }}">{{ $post->title }}</a> </h6>

      <p>{{ $post->description }}</p>
      <small><i class="far fa-comments">&nbsp</i>{{ $post->count_comment }}</small>
      <small> Category: <a href="{{ route('categories.show',$post->category_id) }}"
          class="badge mt-2 badge-secondary">{{ $post->category_id->name }}</a></small>
    </div>
    <div class="col-2 ">
      <h6>Last post</h6>
      <small>By</small> <span class="admin">phong</span>
      <p>Time.....</p>
    </div>
  </div>
</div>
@include('footer');
