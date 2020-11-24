@extends('layouts.livewire')

@section('content')
    <div class="container">
      <div class="card-deck">
            @foreach($posts as $post)


            <div class="card">
                <img src="/images/{{$post->image}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('post.show',$post->id) }}">{{$post->title}}</a></h5>
                    <p class="card-text">{{Str::limit($post->content, $limit = 10, $end = '...') }}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{$post->getCachedCommentsCountAttribute()}}</small>
                </div>
            </div>
            @endforeach


        <div>
@endsection
