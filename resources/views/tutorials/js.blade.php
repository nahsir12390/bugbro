@extends('layouts.app')

@section('title', 'JavaScript Tutorials')

@section('content')
<div class="py-8">
  <h2 class="text-3xl font-bold mb-4 text-center text-gray-900 dark:text-gray-100">
    JavaScript Tutorial Videos
  </h2>

  <p class="text-center max-w-2xl mx-auto mb-8 text-gray-700 dark:text-gray-300">
    Learn JavaScript step by step with these hand-picked video tutorials. From basic syntax to advanced topics like DOM manipulation and async programming, start coding dynamic websites today.
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
      Ready to Try JavaScript Live?
    </h3>
    <p class="mb-4 text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
      Practice what you learn directly in your browser. Use an online JavaScript playground to test code snippets, experiment with frameworks, and see real-time results.
    </p>
    <a href="https://jsfiddle.net/" target="_blank" rel="noopener noreferrer"
      class="inline-block px-6 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">
      Open JSFiddle Playground
    </a>
  </div>

  <div class="mt-12 text-center">
    <h4 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">Pro Tip:</h4>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto">
      Combine JavaScript with HTML and CSS to build interactive UIs. Try adding animations, form validations, and API calls to make your projects dynamic and user-friendly.
    </p>
  </div>
</div>
@endsection
