@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf
                    @method('POST')

                    {{-- title  --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" value="{{ old('title') }}" name="title" class="form-control @error('title') is-invalid @enderror" id="title">
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    {{-- content  --}}
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                    </div>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    {{-- author  --}}
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" value="{{ old('author') }}" name="author" class="form-control @error('author') is-invalid @enderror" id="author">
                    </div>
                    @error('author')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    {{-- category  --}}
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category_id" id="category" class="form-control">
                            <option value="">Select a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : null }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- tags --}}
                    @foreach ($tags as $tag)
                        <div class="form-check mb-3 form-check-inline">
                            <input
                            {{ in_array($tag->id, old('tags', [])) ? 'checked' : null }}
                            class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="{{ $tag->id }}">
                            <label class="form-check-label" for="{{ $tag->id }}">
                                {{ $tag->name }}
                            </label>
                        </div>
                    @endforeach

                    {{-- submit  --}}
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection