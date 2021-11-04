@extends('layouts.dashboard')

@section('content')
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ Route('admin.posts.show', $post->slug) }}">
                    {{ $post->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection