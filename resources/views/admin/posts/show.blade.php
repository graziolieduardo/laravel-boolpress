@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $post->title }}</h1>
                <p>
                    {{ $post->content }}
                </p>

                <small>Author: {{ $post->author }}</small><br>
                @if ($post->category)
                    <small>Category: 
                        <a href="{{ route('admin.categories.show', $post->category->id) }}">
                            {{ $post->category->name }}
                        </a>
                    </small>   
                @else
                    <small>Category: ...</small>
                @endif
            </div>
        </div>
    </div>
@endsection