@extends('layouts.master')

@section('content')
    <table class="table">
        <thead>
            <tr>                
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Number</th>
                <th>Title</th>
                <th>Content</th>
                <th>Function</th>
                <th><input type="button" onclick="location.href='{{ route('blog.create')}}'" class="btn btn-primary" value="Thêm"></input>  </th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <th>{{ $id++ }}</th>
                    <th>{{ $post->title }}</th>
                    <th>{!! $post->content !!}</th>
                    <th>
                        <form method="POST" action="{{ route('blog.delete', ['id' => $post->id]) }}">
                            <input type="button" onclick="location.href='{{ route('blog.show', ['id' => $post->id])}}'" class="btn btn-primary" value="Show"></input>
                            <input type="button" onclick="location.href='{{ route('blog.edit', ['id' => $post->id])}}'" class="btn btn-warning" value="Edit"></input>
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection