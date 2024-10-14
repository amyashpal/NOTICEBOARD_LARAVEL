@extends('layouts.app')

@section('title', 'All Notices')

@section('content')
<h1 class="text-3xl font-bold text-center text-gray-700 mb-8">Notices</h1>

<div id="project-container" class="notice-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($posts as $post)
    <div class="bg-white shadow-md rounded-lg overflow-hidden cursor-pointer transition-transform transform hover:scale-105">
        @if ($post->file_path && preg_match('/\.(jpg|jpeg|png|gif)$/i', $post->file_path))
            <img src="{{ asset($post->file_path) }}" alt="{{ $post->title }}" class="popup-trigger">
        @elseif ($post->file_path && str_ends_with($post->file_path, '.pdf'))
            <div class="p-4 text-center">
                <a href="{{ asset($post->file_path) }}" target="_blank" class="text-xl font-bold text-blue-500">View PDF</a>
            </div>
        @endif

        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-800">{{ $post->title }}</h3>
            <p class="text-gray-600 mt-2">{{ $post->content }}</p>
            
            <!-- Download Button -->
            <a href="{{ asset($post->file_path) }}" download class="inline-flex items-center justify-center mt-2 px-2 py-2 text-white bg-black rounded hover:bg-gray-800 transition-colors">
                <!-- SVG Download Icon -->
                <svg fill="#ffffff" height="24px" width="24px" viewBox="0 0 29.978 29.978" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path d="M25.462,19.105v6.848H4.515v-6.848H0.489v8.861c0,1.111,0.9,2.012,2.016,2.012h24.967c1.115,0,2.016-0.9,2.016-2.012v-8.861H25.462z"/>
                        <path d="M14.62,18.426l-5.764-6.965c0,0-0.877-0.828,0.074-0.828s3.248,0,3.248,0s0-0.557,0-1.416c0-2.449,0-6.906,0-8.723c0,0-0.129-0.494,0.615-0.494c0.75,0,4.035,0,4.572,0c0.536,0,0.524,0.416,0.524,0.416c0,1.762,0,6.373,0,8.742c0,0.768,0,1.266,0,1.266s1.842,0,2.998,0c1.154,0,0.285,0.867,0.285,0.867s-4.904,6.51-5.588,7.193C15.092,18.979,14.62,18.426,14.62,18.426z"/>
                    </g>
                </svg>
            </a>
        </div>
    </div>
    @endforeach
</div>

<!-- Popup Window -->
<div id="popup" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center hidden popup">
    <div class="relative max-w-lg w-full bg-white rounded-lg shadow-lg">
        <span id="close-popup" class="absolute top-2 right-2 text-black cursor-pointer text-2xl">&times;</span>
        <div class="p-6">
            <h3 id="popup-title" class="text-2xl font-semibold text-gray-800 mb-4 text-center"></h3>
            <p id="popup-description" class="text-gray-600 mt-2 mb-2 text-justify text-xl"></p>
            <img id="popup-image" src="" alt="" class="w-full rounded-lg object-cover">
        </div>
    </div>
</div>
@endsection
