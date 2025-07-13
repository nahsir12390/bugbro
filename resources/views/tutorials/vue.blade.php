@extends('layouts.app')

@section('title', 'Vue.JS Tutorials')

@section('content')
<div class="py-8">
  <h2 class="text-3xl font-bold mb-4 text-center text-gray-900 dark:text-gray-100">
    Vue.JS Tutorial Videos
  </h2>

  <p class="text-center max-w-2xl mx-auto mb-8 text-gray-700 dark:text-gray-300">
    Master Vue.js — a powerful, progressive JavaScript framework for building modern interactive user interfaces.
    These tutorials cover everything from core concepts to advanced components and state management.
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
      Try Vue.JS Online
    </h3>
    <p class="mb-4 text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
      Build and test Vue components directly in your browser with <strong>Vue SFC Playground</strong>. It’s a great way to practice Vue without setup.
    </p>
    <a href="https://play.vuejs.org/" target="_blank" rel="noopener noreferrer"
      class="inline-block px-6 py-3 bg-green-600 text-white rounded-full hover:bg-green-700 transition">
      Open Vue Playground
    </a>
  </div>

  <div class="mt-12 text-center">
    <h4 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">
      Why Learn Vue?
    </h4>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto mb-4">
      Vue.js is beginner-friendly yet incredibly powerful. It combines the best of React and Angular with a gentle learning curve, making it ideal for modern web apps, SPAs, and even big projects.
    </p>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto">
      Explore Vue’s reactivity system, components, directives, Vue Router, Vuex, and Composition API to build fast and reactive apps.
    </p>
  </div>

  <div class="mt-12 text-center">
    <h4 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">
      Take Action
    </h4>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto mb-4">
      After these tutorials, build your own Vue project: maybe a task manager, weather app, or blog front-end.
      Dive deeper into the <a href="https://vuejs.org/" target="_blank" class="text-blue-600 dark:text-blue-400 underline">Vue Official Docs</a> to master advanced features.
    </p>
    <a href="https://vuejs.org/" target="_blank" rel="noopener noreferrer"
      class="inline-block px-6 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">
      Read Vue Docs
    </a>
  </div>
</div>
@endsection
