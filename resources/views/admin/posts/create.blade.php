@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" value="{{ old('title') }}" name="title" class="form-control @error('title') is-invalid @enderror" id="title">
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                    </div>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" value="{{ old('author') }}" name="author" class="form-control @error('author') is-invalid @enderror" id="author">
                    </div>
                    @error('author')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection