@extends('layouts.base')

@section('contents')
    <div class="w-9/12  ">


        <h1 class="text-xl font-bold mb-5">Add Post</h1>

        @if ($errors->any())
            <div class="mb-5 border-2 border-red-600 drop-shadow-lg rounded-t-lg">
                <div class="bg-red-600 text-white text-lg p-2">
                    Please fix below
                </div>

                <ul class="p-2 text-red-500">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>
        @endif


        <div class="mb-5 bg-white drop-shadow-lg p-4 rounded-lg">
            <form action="{{ route('posts.create') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Post Title</label>
                    <input name="title" class="w-full border-2 p-4 rounded-lg mt-2" type="text" value="{{ old('title') }}"
                        placeholder="Post Title">
                </div>

                <div class="mb-3">
                    <label>Post Body</label>
                    <textarea name="body" placeholder="Post Body" class="w-full border-2 rounded-lg p-4" rows="4" cols="30">{{ old('body') }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Post Image</label>
                    <input name="image" class="w-full border-2 p-4 rounded-lg mt-2" type="file" placeholder="Post Image">
                </div>

                <button type="submit" class="mt-3 py-2 px-4 rounded-lg text-white w-fit bg-green-500">Create</button>

            </form>
        </div>

    </div>
@endsection
