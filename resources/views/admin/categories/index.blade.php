@extends('layouts.dashboard')

@section('content')
    @if (session('added'))
        <div class="alert alert-success">
            {{ session('added') }}
        </div>
    @endif
    @if (session('deleted'))
        <div class="alert alert-danger">
            {{ session('deleted') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <a href="{{ route('admin.categories.show', $category->id) }}">
                            <button class="btn btn-primary">Details</button>
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" class="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.categories.create') }}">
        <div class="btn btn-primary">Add new Category</div>
    </a>
@endsection