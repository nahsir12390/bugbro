@extends('layouts.app')

@section('title', 'Ruby Tutorials')

@section('content')
<div class="py-8">
  <h2 class="text-3xl font-bold mb-4 text-center text-gray-900 dark:text-gray-100">
    Ruby Tutorial Videos
  </h2>

  <p class="text-center max-w-2xl mx-auto mb-8 text-gray-700 dark:text-gray-300">
    Dive into Ruby — a friendly, high-level programming language that’s easy to read and powerful for building websites, automations, and tools.
    Follow these video tutorials to learn Ruby basics, syntax, and real-world uses like building apps with Ruby on Rails.
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
      Try Ruby Online
    </h3>
    <p class="mb-4 text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
      Test Ruby code instantly in your browser with an interactive playground. Practice syntax, run scripts, or explore small Ruby programs.
    </p>
    <a href="https://repl.it/languages/ruby" target="_blank" rel="noopener noreferrer"
      class="inline-block px-6 py-3 bg-rose-600 text-white rounded-full hover:bg-rose-700 transition">
      Open Ruby REPL
    </a>
  </div>

  <div class="mt-12 text-center">
    <h4 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">
      Why Learn Ruby?
    </h4>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto mb-4">
      Ruby’s clean syntax and helpful community make it perfect for beginners.
      It’s the backbone of many web applications — especially with Ruby on Rails, which powers sites like GitHub, Shopify, and Airbnb.
    </p>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto">
      Once you’re comfortable, try building a simple blog or CRUD app with Rails — or automate daily tasks with Ruby scripts.
    </p>
  </div>

  <div class="mt-12 text-center">
    <h4 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">
      Keep Going
    </h4>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto mb-4">
      For deeper learning, visit the official <a href="https://www.ruby-lang.org/en/documentation/" target="_blank" class="text-rose-600 dark:text-rose-400 underline">Ruby Docs</a>.
      They cover everything from beginner to advanced topics.
    </p>
    <a href="https://www.ruby-lang.org/en/documentation/" target="_blank" rel="noopener noreferrer"
      class="inline-block px-6 py-3 bg-rose-600 text-white rounded-full hover:bg-rose-700 transition">
      Read Ruby Docs
    </a>
  </div>
</div>
@endsection
