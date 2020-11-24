@extends('layouts.livewire')


@section('content')
    <br>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <form method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
            <div class="form-group">
                @method('PUT')
                @csrf
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" value="{{$post->title}}"/>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea cols="10" rows="10" class="form-control" name="content">{{$post->content}}</textarea>
            </div>

            <div class="form-group">
                <img src="/images/{{$post->image}}"  width="500" height="auto">

                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
