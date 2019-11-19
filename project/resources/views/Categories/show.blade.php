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
  
        <p class="d-flex text-dark">{{ $post->description }}</p>
  
        {{-- <small> Category: <a href="{{ route('categories.show',$post->category_id) }}"
            class="badge mt-2 badge-secondary">{{ $post->category->name }}</a></small>
        <br> --}}
        <small><i class="far fa-comments">&nbsp</i> {{ $post->count_comment }}</small>
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
        <a href="{{ route('users.show',$post->id) }}"><small>By</small> <span class="admin">{{$post->userName->name}}</span></a>
        <p>{{ $post->updated_at }}</p>
      </div>
    </div>
@endforeach
</div>
@include('footer');