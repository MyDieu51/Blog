@extends('layouts.master')

@section('content')
    @foreach($posts as $post)
    <a href="{{route('blog.show', ['id'=>$post->id])}}"/>
        <h2>{{ $post -> title }}</h2>
    </a>
    <h4>{!! $post -> content !!}</h4>
    @endforeach
@endsection