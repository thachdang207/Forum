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
    <div class="col-8">
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
      <small>By</small> <span class="admin">{{$post->name}}</span>
      <p>Time....</p>
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
{{--  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 offset-3 mb-5">
        <form action="{{ route('posts.create') }}" method="GET">
<button type="submit" class="otherButton">Add post</button>
</form>
</div>
</div>
</div> --}}

<!--Phong-->

{{-- <body>
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
<!--
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
          {{--  {{ $posts->links("pagination::bootstrap-4")}}  --}}
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
</html> -->
@include('footer');
