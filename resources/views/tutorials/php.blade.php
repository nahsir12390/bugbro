@extends('layouts.app')

@section('title', 'PHP Tutorials')

@section('content')
<div class="py-8">
  <h2 class="text-3xl font-bold mb-4 text-center text-gray-900 dark:text-gray-100">
    PHP Tutorial Videos
  </h2>

  <p class="text-center max-w-2xl mx-auto mb-8 text-gray-700 dark:text-gray-300">
    Dive into the world of PHP — one of the most popular server-side scripting languages for building dynamic websites and powerful backends.
    These tutorials cover everything from PHP basics to advanced OOP, frameworks, and connecting with databases like MySQL.
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
      Practice PHP Live in Your Browser
    </h3>
    <p class="mb-4 text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
      Build, test, and share PHP code without installing anything on your machine. Use online tools like PHP Sandbox to run your scripts instantly.
      Experiment with functions, forms, sessions, and more.
    </p>
    <a href="https://phpsandbox.io/" target="_blank" rel="noopener noreferrer"
      class="inline-block px-6 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">
      Open PHP Sandbox
    </a>
  </div>

  <div class="mt-12 text-center">
    <h4 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">
      Why Learn PHP?
    </h4>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto mb-4">
      PHP powers millions of websites worldwide, including major platforms like WordPress and Facebook. Knowing PHP opens up opportunities in web development,
      from freelance projects to building custom CMS, APIs, and more.
    </p>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto">
      Combine PHP with Laravel — one of the most popular PHP frameworks — to build secure, scalable applications faster and with modern best practices.
    </p>
  </div>

  <div class="mt-12 text-center">
    <h4 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">
      Next Steps
    </h4>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto mb-4">
      After mastering the basics, try building your own login system, a small blog, or a RESTful API with Laravel. Don’t forget to practice database queries with MySQL.
    </p>
    <a href="{{route('tutorial.laravel')}}" target="_blank" rel="noopener noreferrer"
      class="inline-block px-6 py-3 bg-green-600 text-white rounded-full hover:bg-green-700 transition">
      Learn Laravel
    </a>
  </div>
</div>
@endsection
