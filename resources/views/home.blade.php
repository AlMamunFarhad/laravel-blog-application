@extends('layouts.frontPage')

@section('content')
       
       @if($posts->count())
        @foreach($posts as $post)
        <div class="post-preview">
          <a href="{{route('home.post', $post->slug)}}">
            <h2 class="post-title">
              {{$post->title}}
            </h2>
            <h3 class="post-subtitle">
              {{Illuminate\Support\Str::words($post->title, 2, '...')}}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">{{$post->user->name}}</a>
            {{$post->created_at->format('d-m-Y')}}</p>
        </div>
        <hr>
        @endforeach 
        @endif
        <!-- Pager -->
        {{-- {{gettype($posts->currentPage())}} --}}
        {{-- {{$posts->lastPage()}} --}}
      <div class="clearfix">
        @if($posts->currentPage() === 1)
          <a class="btn btn-primary float-right" href="{{$posts->nextPageUrl()}}">Newer Posts &rarr;</a>

          @elseif(!$posts->hasMorePages())
           <a class="btn btn-primary float-left" href="{{$posts->previousPageUrl()}}">&larr; Older Posts</a>

          @else
            <a class="btn btn-primary float-left" href="{{$posts->previousPageUrl()}}">&larr; Older Posts</a>
            <a class="btn btn-primary float-right" href="{{$posts->nextPageUrl()}}">Newer Posts &rarr;
            </a>
        @endif
      </div>
 {{-- <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a> --}}
@endsection