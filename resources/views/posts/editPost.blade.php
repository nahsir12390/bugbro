@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12 bg-white dark:bg-gray-900 transition-colors duration-300">
  <div class="w-full max-w-2xl bg-white dark:bg-gray-800 shadow rounded-lg p-8">
    <h1 class="text-3xl md:text-4xl font-bold text-center text-gray-900 dark:text-white mb-6">
      Edit Post
    </h1>

    @if ($errors->any())
      <div class="mb-4 rounded-lg bg-red-100 dark:bg-red-800 p-4">
        <ul class="list-disc list-inside text-red-700 dark:text-red-200">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('updateData', $post->id) }}">
      @csrf
      @method('PUT')

      <div class="mb-6">
        <label for="content" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">
          Update your Post
        </label>
        <textarea
          name="content"
          id="content"
          rows="6"
          placeholder="Edit your post content..."
          class="w-full p-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none"
        >{{ old('content', $post->content) }}</textarea>
      </div>

      <div class="flex justify-center">
        <button type="submit"
          class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
          Save Changes
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
