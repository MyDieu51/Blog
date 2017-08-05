@extends('layouts.master')

@section('content')
    <h2>{{ $post -> title }}</h2>
    <h4>{!! $post -> content !!}</h4>

        <form method="POST" action="{{route('blog.delete', ['id'=>$post->id])}}">
            {{ csrf_field() }}
            <input type="button" value="Back" class="btn btn-warning" onclick="window.history.back()">
            <input type="button" value="Edit" class="btn btn-danger" onclick="location.href='{{ route('blog.edit', ['id'=>$post->id]) }}';">
            <input type="submit" value="Delete" class="btn btn-primary" >
        </form>
@endsection