@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $category->name }}</h1>
               

                <small>{{ $category->slug }}</small>
            </div>
        </div>
    </div>
@endsection