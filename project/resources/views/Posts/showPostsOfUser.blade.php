<?php session_start() ?>

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
  {{-- begin --}}
  @foreach($posts as $post)
  <div class="row row-post">
    <div class="col-1 d-flex align-items-center">
      <div class="avatar"></div>
    </div>
    <div class="col-8">
      <h6 class="title"> <a href="{{route('posts.show',$post->id) }}">{{ $post->title }}</a> </h6>

      <p>{{ $post->description }}</p>

      <small> Category: <a href="{{ route('categories.show',$post->category_id) }}"
          class="badge mt-2 badge-secondary">{{ $post->category->name }}</a></small>
      <br>
      {{-- <small><i class="far fa-comments">&nbsp</i> {{ $post->count_comment }}</small> --}}
    </div>
    <div class="col-1 flex-column justify-content-between">
        {{-- @if($post->count_report>0)
        <a href="{{ route('reports.show',$post->id) }}" class="text-danger">
            <i class="fas fa-exclamation-triangle"></i>
            {{ $post->count_report }}
        </a>
        @endif --}}
      </div>
    <div class="col-2 ">
      <h6>Last post</h6>
      <a href="{{ route('users.show',$post->id) }}"><small>By</small> <span class="admin">{{$post->name}}</span></a>
      <p>{{ $post->updated_at }}</p>
    </div>
  </div>
  @endforeach
  {{-- end --}}
  {{-- <div class="row">
    <div class="col-12 col-md-6 offset-3 col-md-6-mt-6">
      <ul class="list-unstyled">
        @foreach($posts as $post)
        <div class="border-bottom mt-1">
          <li class="ml-1">
            <div class="d-flex justify-content-between">
              <a href="{{ route('posts.show',$post->id) }}" class="text-primary">
                <h5 class="">{{ $post->title }}</h5>
              </a>
              <form action="{{ route('posts.destroy',$post->id) }}" method="POST" class="">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
              {{-- @if(isset($_SESSION['uid']))
                                        @if($_SESSION['uid'=='adminm'])
                                        <form action="{{ route('posts.destroy',$post->id) }}" method="POST" class="">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-danger">Delete</button>
              </form>
              @endif
              @endif --}}
            {{-- </div>
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
  </div> --}}
</div>
@include('footer');