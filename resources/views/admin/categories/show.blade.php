@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $category->name }}</h1>
               
                <small>{{ $category->slug }}</small>

                <h2 class="mt-5">Related Posts:</h2>
                <ul>
                    @forelse ($category->posts as $post)
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