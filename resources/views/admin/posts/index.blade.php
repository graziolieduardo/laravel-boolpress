@extends('layouts.dashboard')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->author }}</td>
                    <td>
                        <a href="{{ Route('admin.posts.show', $post->slug) }}">
                            <button class="btn btn-primary">Details</button>
                        </a>
                        <a href="{{ Route('admin.posts.edit', $post->id) }}">
                            <button class="btn btn-warning">Modify</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection