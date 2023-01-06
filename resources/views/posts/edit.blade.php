@extends('layouts.base')

@section('contents')

    @if ($post == null)
        <div class="mb-5 bg-white drop-shadow-lg p-4 rounded-lg">
            <p>Post not found</p>
        </div>
    @else
        <div class="w-9/12  ">


            <h1 class="text-xl font-bold mb-5">Edit Post</h1>

            @if ($errors->any())
                <div class="mb-5 bg-white border-2 border-red-600 drop-shadow-lg rounded-t-lg">
                    <div class="bg-red-600 text-white text-lg p-2">
                        Please fix below
                    </div>

                    <ul class="p-2 text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>
            @endif


            <div class="mb-5 bg-white drop-shadow-lg p-4 rounded-lg">
                <form action="{{ route('posts.edit', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- @method('PATCH') --}}

                    <div class="mb-3">
                        <label>Post Title</label>
                        <input name="title" class="w-full border-2 p-4 rounded-lg mt-2" type="text"
                            value="{{ old('title') ? old('title') : $post->title }}" placeholder="Post Title">
                    </div>

                    <div class="mb-3">
                        <label>Post Body</label>
                        <textarea name="body" placeholder="Post Body" class="w-full border-2 rounded-lg p-4" rows="4" cols="30">{{ old('body') ? old('body') : $post->body }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Post Image</label>
                        <input name="image" class="w-full border-2 p-4 rounded-lg mt-2" type="file" placeholder="Post Image">
                    </div>

                    <button type="submit"
                        class="mt-3 py-2 px-4 rounded-lg text-white w-fit bg-green-500">Update</button>

                </form>
            </div>

        </div>
    @endif


@endsection
