@extends('layouts.app')

@section('title', 'React.JS Tutorials')

@section('content')
<div class="py-8">
  <h2 class="text-3xl font-bold mb-4 text-center text-gray-900 dark:text-gray-100">
    React.JS Tutorial Videos
  </h2>

  <p class="text-center max-w-2xl mx-auto mb-8 text-gray-700 dark:text-gray-300">
    Learn React — the world’s most popular JavaScript library for building modern user interfaces. These videos guide you from the basics to advanced hooks, context, routing, and state management.
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
      Try React.JS Online
    </h3>
    <p class="mb-4 text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
      Experiment with React code live in the browser using the <strong>CodeSandbox Playground</strong> — spin up a new React app instantly, no install needed.
    </p>
    <a href="https://codesandbox.io/s/new" target="_blank" rel="noopener noreferrer"
      class="inline-block px-6 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">
      Open CodeSandbox
    </a>
  </div>

  <div class="mt-12 text-center">
    <h4 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">
      Why Learn React?
    </h4>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto mb-4">
      React is trusted by millions of developers for building complex web apps with reusable components, fast rendering, and an amazing developer experience.
      It powers sites like Facebook, Instagram, Netflix, and countless startups.
    </p>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto">
      Once you grasp JSX, props, state, hooks, and context, you’ll be equipped to build anything — from a portfolio to a full SaaS platform.
    </p>
  </div>

  <div class="mt-12 text-center">
    <h4 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">
      Build Something Now
    </h4>
    <p class="text-gray-700 dark:text-gray-300 max-w-xl mx-auto mb-4">
      After these tutorials, challenge yourself by building a todo app, weather dashboard, or even an interactive quiz.
      Explore the <a href="https://react.dev/" target="_blank" class="text-blue-600 dark:text-blue-400 underline">React Official Docs</a> for deep dives.
    </p>
    <a href="https://react.dev/" target="_blank" rel="noopener noreferrer"
      class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition">
      Read React Docs
    </a>
  </div>
</div>
@endsection
