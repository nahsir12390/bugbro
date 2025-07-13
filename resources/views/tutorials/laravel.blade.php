@extends('layouts.app')

@section('title', 'Laravel Tutorials')

@section('content')
<div class="py-8">
  <h2 class="text-3xl font-bold mb-4 text-center text-gray-900 dark:text-gray-100">
    Laravel Tutorial Videos
  </h2>

  <p class="text-center max-w-2xl mx-auto mb-8 text-gray-700 dark:text-gray-300">
    Learn Laravel — the elegant PHP framework for building robust, modern web applications with ease.
    This collection of videos will guide you through Laravel’s powerful features, from routing and controllers to Eloquent ORM and authentication.
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
      Try Laravel Online
    </h3>
    <p class="mb-4 text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
      Experiment with Laravel in your browser without installing anything locally. Use tools like <strong>Laravel Playgrounds</strong> to build, test, and share Laravel snippets instantly.
    </p>
    <a href="https://laravelplayground.com/" target="_blank" rel="noopener noreferrer"
      class="inline-block px-6 py-3 bg-red-600 text-white rounded-full hover:bg-red-700 transition">
      Open Laravel Playground
    </a>
  </div>

  <div class="mt-12 text-center">
    <h4 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">
      Why Laravel?
    </h4>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto mb-4">
      Laravel makes web development enjoyable and productive. It’s trusted by thousands of developers for its clear syntax, powerful tooling, and huge community.
      You can build everything from simple blogs to large-scale applications and APIs.
    </p>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto">
      Explore Laravel’s features like Blade templating, Eloquent ORM, authentication, queues, notifications, and RESTful routing.
    </p>
  </div>

  <div class="mt-12 text-center">
    <h4 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">
      Take Your Next Step
    </h4>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto mb-4">
      After watching these videos, try building your own Laravel project: maybe a blog, chat app, or simple e-commerce site.
      Dive into the <a href="https://laravel.com/docs" target="_blank" class="text-blue-600 dark:text-blue-400 underline">Laravel Docs</a> to deepen your skills.
    </p>
    <a href="https://laravel.com/docs" target="_blank" rel="noopener noreferrer"
      class="inline-block px-6 py-3 bg-green-600 text-white rounded-full hover:bg-green-700 transition">
      Read Laravel Docs
    </a>
  </div>
</div>
@endsection
