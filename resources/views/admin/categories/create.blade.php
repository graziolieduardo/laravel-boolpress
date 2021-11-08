@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    @method('POST')

                    {{-- title  --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Title</label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control">
                    </div>
                    {{-- @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}

                    {{-- submit  --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection