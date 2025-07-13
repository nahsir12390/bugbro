@extends('layouts.app')

@section('title', 'C++ Tutorials')

@section('content')
<div class="py-8">
  <!-- Hero Section -->
  <div class="mb-10 text-center">
    <h1 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900 dark:text-gray-100">
      Master C++ Programming
    </h1>
    <p class="text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
      Explore beginner to advanced C++ tutorials. Learn the fundamentals, object-oriented concepts, and advanced topics with curated video lessons.
    </p>
  </div>

  <!-- Videos Grid -->
  <h2 class="text-2xl md:text-3xl font-bold mb-6 text-center text-gray-900 dark:text-gray-100">
    C++ Tutorial Videos
  </h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
    @foreach($videos as $video)
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden flex flex-col">
        <div class="aspect-w-16 aspect-h-9">
          <iframe
            class="w-full h-full"
            src="https://www.youtube.com/embed/{{ $video['id']['videoId'] }}"
            frameborder="0"
            allowfullscreen>
          </iframe>
        </div>
        <div class="p-4 flex-1 flex flex-col">
          <h6 class="text-lg font-semibold mb-2 text-gray-900 dark:text-gray-100">
            {{ $video['snippet']['title'] }}
          </h6>
          <p class="text-sm text-gray-700 dark:text-gray-300">
            {{ Str::limit($video['snippet']['description'], 100) }}
          </p>
        </div>
      </div>
    @endforeach
  </div>

  <!-- Tips Section -->
  <div class="bg-gray-200 dark:bg-gray-800 rounded-lg p-6 mb-12">
    <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Key C++ Topics Covered</h3>
    <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300">
      <li>Basic Syntax and Structure</li>
      <li>Variables and Data Types</li>
      <li>Functions and Classes</li>
      <li>Object-Oriented Programming</li>
      <li>Memory Management</li>
      <li>Advanced C++ Techniques</li>
    </ul>
  </div>

  <!-- Call to Action -->
  <div class="text-center">
    <h4 class="text-lg md:text-xl font-bold mb-2 text-gray-900 dark:text-gray-100">
      Ready to build real projects?
    </h4>
    <p class="text-gray-700 dark:text-gray-300 mb-4">
      Put your C++ skills to the test by creating small applications and contributing to open-source.
    </p>
    <a href="#" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">
      Get Started Now
    </a>
  </div>
</div>
@endsection
