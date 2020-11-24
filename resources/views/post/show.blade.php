@extends('layouts.livewire')


@section('content')
    <div class="container">
        <br>


        <label for="title">Title:</label>
        {{$post->title}}

        <br>

        <label for="description">Description:</label>
        {{$post->content}}
        <br>

        <label for="description">image:</label>
            <img src="/images/{{$post->image}}" alt="Girl in a jacket" width="500" height="auto">


    </div>
    <div class="container">
        @if (Auth::guest())
            <label for="description">Login For Comment</label>
            <a href="{{ route('login') }}" class="btn">login</a>
        @else
            <div class="form-group">
                <form method="post" action="{{route('comment.store',$post->id)}}" >
                    @csrf
                <label for="description">write comment:</label>
                <textarea cols="10" rows="4" class="form-control" name="comment"></textarea>
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                </form>
            </div>
        @endif
        @foreach($comments as $comment)

                <div class='friend'>
                    <h3>{{$comment->user->name}}</h3>
                    <p>{{$comment->comment}}</p>
                                </div>
            @endforeach
    </div>
@endsection

