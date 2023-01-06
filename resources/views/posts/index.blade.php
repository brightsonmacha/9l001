@extends('layouts.base')
@section('contents')
    <div class="w-9/12 mx-auto">
        <div class="mb-4">
            <h1 class="block text-xl font-bold">Posts</h1>

            <a href="{{ route('posts.create') }}"
                class="mx-auto mr-0 block mt-2 w-fit text-center text-white py-2 px-4 bg-green-500 rounded-full transition-all hover:bg-green-400">
                Add Post
            </a>

        </div>

        @if (session()->has('message'))
            <div class="mt-3 p-3 block bg-green-400 text-white rounded-t-lg">
                <p>{{ session('message') }}</p>

            </div>
        @endif


        <div class="mt-10">

            @foreach ($posts as $post)
                <div class="mb-5 bg-white drop-shadow-lg p-4 rounded-lg text-gray-800">
                    <a href="{{ route('posts.show', $post->id) }}">
                        <h1 class="font-bold"> {{ $post->title }}</h1>
                    </a>
                    <p>{{ $post->body }}</p>

                    <div class=" w-fit mt-4 block">
                        <a href="{{ route('posts.edit', $post->id) }}" class=" bg-blue-500 px-2 py-1 rounded-lg">Edit</a>

                        <form class="inline" method="POST" action="{{ route('posts.delete', $post->id) }}">
                            @csrf
                            <button type="submit" class="mt-2 bg-red-500 ml-2 px-2 py-1 rounded-lg">Delete</button>

                        </form>

                    </div>

                </div>
            @endforeach

        </div>

        <div class="mx-auto w-full ">
            {{ $posts->links() }}
        </div>

    </div>
@endsection
