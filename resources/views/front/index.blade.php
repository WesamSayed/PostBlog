@extends('front/layouts/master')

@section('image',asset('front/img/home-bg.jpg'))


@section('content')

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      @foreach($posts as $post)
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
          <form action="/singlepost/{{$post->id}}" method="GET">
          @csrf
          
            <h2 class="post-title">
             <a href="{{url('/singlepost').'/'.$post->id}}">{{$post->title}}</a> 
            </h2>
            <p class="post-meta">
           {{$post->created_at->diffForHumans()}}</p>
            
            </form>
          
        </div>
        <hr>
      </div>
      @endforeach
       
    </div>
    <!-- Pager -->
    <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
  </div>

  <hr>

  @endsection


