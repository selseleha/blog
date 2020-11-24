@extends('layouts.livewire')

@section('content')
    <div class="container">
    <br>
        <a type="button" href="{{route('post.create')}}" class="btn btn-primary">Add New Post</a>
        <br>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Description</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{ route('post.show',$post->id) }}">{{$post->title}}</a></td>
                    <td>{{Str::limit($post->content, $limit = 10, $end = '...') }}</td>
                    <td>@if ($post->userCanEdit(Auth::user()))
                            <a href="{{ route("post.edit",$post->id) }}">Edit</a>
                        @endif</td>

                    <td>@if ($post->userCanEdit(Auth::user()))
                            <a href="{{ route("post.destroy",$post->id) }}">Delete</a>
                        @endif</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection
