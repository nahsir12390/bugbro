@extends('layouts.app')

@section('title', 'jQuery Tutorials')

@section('content')
<div class="py-8">
  <h2 class="text-3xl font-bold mb-4 text-center text-gray-900 dark:text-gray-100">
    jQuery Tutorial Videos
  </h2>

  <p class="text-center max-w-2xl mx-auto mb-8 text-gray-700 dark:text-gray-300">
    Get started with jQuery, the popular JavaScript library that makes DOM manipulation, AJAX requests,
    and event handling easier than ever. Learn the basics, practical tricks, and how to integrate it into modern projects.
  </p>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($videos as $video)
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden flex flex-col">
        <div class="aspect-w-16 aspect-h-9">
          <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $video['id']['videoId'] }}" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="p-4 flex flex-col flex-grow">
          <h6 class="text-lg font-semibold mb-2 text-gray-800 dark:text-gray-200">{{ $video['snippet']['title'] }}</h6>
          <p class="text-sm text-gray-600 dark:text-gray-400">{{ Str::limit($video['snippet']['description'], 100) }}</p>
        </div>
      </div>
    @endforeach
  </div>

  <div class="mt-12 text-center">
    <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">
      Practice jQuery Online
    </h3>
    <p class="mb-4 text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
      Want to test your jQuery skills instantly? Use JSFiddle to create, edit, and run HTML, CSS, and jQuery code in the browser.
      No local setup needed — perfect for experiments.
    </p>
    <a href="https://jsfiddle.net/" target="_blank" rel="noopener noreferrer"
      class="inline-block px-6 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">
      Try jQuery on JSFiddle
    </a>
  </div>

  <div class="mt-12 text-center">
    <h4 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">
      What You’ll Build
    </h4>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto mb-4">
      After these tutorials, you’ll know how to select DOM elements, add animations, create sliders,
      handle form submissions, and make AJAX calls using jQuery.
    </p>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto">
      jQuery is still widely used for legacy projects and quick enhancements. Combine it with Bootstrap or simple PHP sites for powerful interactivity.
    </p>
  </div>

  <div class="mt-12 text-center">
    <h4 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">
      More jQuery Resources
    </h4>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto mb-4">
      When you’re ready for advanced topics, visit the
      <a href="https://api.jquery.com/" target="_blank" class="text-blue-600 dark:text-blue-400 underline">Official jQuery API Documentation</a>
      to master every selector, method, and event.
    </p>
    <a href="https://api.jquery.com/" target="_blank" rel="noopener noreferrer"
      class="inline-block px-6 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">
      Read jQuery Docs
    </a>
  </div>
</div>
@endsection
