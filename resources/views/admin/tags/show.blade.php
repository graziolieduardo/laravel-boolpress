@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $tag->name }}</h1>
               
                <small>{{ $tag->slug }}</small>

                <h2 class="mt-5">Related Posts:</h2>
                <ul>
                    @forelse ($tag->post as $post)
                        <a href="{{ route('admin.posts.show', $post->slug) }}">
                            <li>{{$post->title}}</li>
                        </a>
                    @empty
                        <li>No related posts</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection