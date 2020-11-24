@extends('layouts.livewire')

@section('content')
    <div class="container">

            @foreach($posts as $post)


            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/images/{{$post->image}}" class="card-img-top" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('post.show',$post->id) }}">{{$post->title}}</a></h5>
                            <p class="card-text">{{Str::limit($post->content, $limit = 20, $end = '...') }}</p>
                            <p class="card-text"><small class="text-muted">comments: {{$post->getCachedCommentsCountAttribute()}}</small></p>
                        </div>
                    </div>
                </div>
            </div>


            @endforeach



@endsection
