@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-10 bg-secondary my-3">
                <h1 class="text-center text-white fw-bold">Blog Posts</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-10">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-sm-12 col-md-4">
                            <div class="card">
                                <div class="card-header">{{ $post->title }} - {{$post->publication_date}}</div>
                                <div class="card-body">
                                    {!! $post->description !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        </div>

    </div>
@endsection






