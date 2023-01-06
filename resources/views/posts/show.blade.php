@extends('layouts.base')

@section('contents')
    <div class="w-9/12  ">

        @if ($post == null)
            <div class="mb-5 bg-white drop-shadow-lg p-4 rounded-lg">
                <p>Post not found</p>
            </div>
        @else
            <h1 class="text-xl font-bold mb-5">{{ $post->title }}</h1>

            <div class="mb-5 bg-white drop-shadow-lg p-4 rounded-lg">
                <p>{{ $post->body }}</p>
            </div>
        @endif

    </div>
@endsection
