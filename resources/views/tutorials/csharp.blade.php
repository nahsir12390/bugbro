@extends('layouts.app')

@section('title', 'C# Tutorials')

@section('content')
<div class="py-8">
  <!-- Hero Section -->
  <div class="mb-10 text-center">
    <h1 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900 dark:text-gray-100">
      Learn C# Programming
    </h1>
    <p class="text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
      Dive into C# from beginner to advanced. Understand .NET basics, object-oriented programming, and real-world applications.
    </p>
  </div>

  <!-- Video Grid -->
  <h2 class="text-2xl md:text-3xl font-bold mb-6 text-center text-gray-900 dark:text-gray-100">
    C# Tutorial Videos
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

  <!-- Key Topics Section -->
  <div class="bg-gray-200 dark:bg-gray-800 rounded-lg p-6 mb-12">
    <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Key C# Topics Covered</h3>
    <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300">
      <li>Introduction to C# and .NET</li>
      <li>Data Types and Variables</li>
      <li>Control Structures</li>
      <li>Classes and Objects</li>
      <li>Interfaces and Inheritance</li>
      <li>LINQ and Advanced Patterns</li>
    </ul>
  </div>

  <!-- CTA -->
  <div class="text-center">
    <h4 class="text-lg md:text-xl font-bold mb-2 text-gray-900 dark:text-gray-100">
      Start Building with C#
    </h4>
    <p class="text-gray-700 dark:text-gray-300 mb-4">
      Apply your C# knowledge by creating desktop or web apps with .NET — practice makes perfect!
    </p>
    <a href="https://dotnetfiddle.net/" target="_blank" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">
  Try a C# Project
</a>
  </div>
</div>
@endsection
