@extends('layouts.app')
@section('title', 'community posts')
@section('content')
<main class="max-w-5xl mx-auto px-4 py-12">
  <h1 class="text-center text-3xl sm:text-4xl font-bold mb-8 animate__animated animate__bounceIn">
    Community Posts
  </h1>

  @foreach ($posts as $post)
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 mb-8" data-aos="fade-right">
      <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-4">
        <a href="{{ route('user.profile', $post->user->id) }}"
           class="text-indigo-600 dark:text-indigo-400 capitalize hover:underline font-semibold">
          {{ $post->user->name ?? 'Unknown' }}
        </a>

        {{-- Friend Button (optional) --}}
      </div>

      <p class="text-lg text-gray-800 dark:text-gray-200 mb-4 text-center">
        {{ $post->content }}
      </p>

      {{-- Like/Unlike Buttons --}}
      @include('posts.like&unlike')

      <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">
        Posted on: {{ $post->created_at->format('l, h:i A') }}
      </div>

      {{-- Comments Section --}}
      @include('posts.commentsFolder.comments')

      @if(auth()->id() === $post->user_id)
        <div class="flex justify-end gap-3 mt-4">
          <a href="{{ route('editData', $post->id) }}"
             class="inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
            Edit
          </a>
          <form id="delete-form-{{ $post->id }}"
                action="{{ route('deleteData', $post->id) }}"
                method="POST"
                class="inline">
            @csrf
            @method('DELETE')
            <button type="button"
                    onclick="confirmDelete({{ $post->id }})"
                    class="inline-block px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
              Delete
            </button>
          </form>
        </div>
      @endif
    </div>
  @endforeach

  <div class="flex justify-center mt-10">
    {{ $posts->links() }}
  </div>
</main>
@endsection
