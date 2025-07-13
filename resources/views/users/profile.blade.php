@extends('layouts.app')
@section('title', ' Profile')
@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">
  <!-- Profile Header -->
  <div class="flex flex-col md:flex-row items-center justify-between bg-white dark:bg-gray-800 shadow rounded-lg p-6">
    <div class="text-center md:text-left">
      <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-2">
        {{ $user->name }}
      </h2>
      <p class="text-gray-600 dark:text-gray-300">
        Developer | Member since {{ $user->created_at->format('F Y') }}
      </p>
    </div>

    <div class="mt-4 md:mt-0">
      <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0D8ABC&color=fff"
           alt="Avatar"
           class="w-24 h-24 rounded-full shadow-md border-4 border-indigo-600">
    </div>
  </div>

  <!-- User's Posts -->
  <div class="mt-10">
    <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-6 text-center">
      Posts by {{ $user->name }}
    </h4>

    @forelse ($posts as $post)
      <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 mb-6">
        <p class="text-gray-800 dark:text-gray-100 mb-3">
          {{ $post->content }}
        </p>
        <div class="text-gray-500 dark:text-gray-400 text-sm">
          Posted on {{ $post->created_at->format('M d, Y h:i A') }}
        </div>
      </div>
    @empty
      <p class="text-center text-gray-500 dark:text-gray-400">
        This user hasn’t posted anything yet.
      </p>
    @endforelse
  </div>
</div>
@endsection
