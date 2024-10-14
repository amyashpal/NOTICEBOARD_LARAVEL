@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<div class="container mx-auto mt-10 p-8 max-w-lg bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-center text-gray-700 mb-8">Create a New Post</h2>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title Input -->
        <div class="mb-5">
            <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
            <input 
                type="text" 
                id="title" 
                name="title" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" 
                required
            >
        </div>

        <!-- Content Textarea -->
        <div class="mb-5">
            <label for="content" class="block text-gray-700 font-medium mb-2">Content</label>
            <textarea 
                id="content" 
                name="content" 
                rows="5" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" 
                required
            ></textarea>
        </div>

        <!-- File Upload Input -->
        <div class="mb-5">
            <label for="file" class="block text-gray-700 font-medium mb-2">Upload Image or PDF</label>
            <input 
                type="file" 
                id="file" 
                name="file" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none"
                accept=".jpg,.jpeg,.png,.gif,.pdf"
            >
        </div>

        <!-- Submit Button -->
        <button 
            type="submit" 
            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg"
        >
            Submit
        </button>
    </form>
</div>
@endsection
