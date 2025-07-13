<div class="mt-2">
  <h5 class="text-lg font-semibold mb-2 text-gray-900 dark:text-gray-100">Comments:</h5>

  @foreach ($post->comments as $comment)
    <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 mb-2 bg-white dark:bg-gray-800 shadow-sm">
      <strong class="block text-gray-800 dark:text-gray-100 capitalize">{{ $comment->user->name ?? 'Unknown' }}:</strong>
      <p class="text-gray-700 dark:text-gray-300 mt-1">{{ $comment->body }}</p>
      <small class="text-gray-500 dark:text-gray-400 block mt-1">{{ $comment->created_at->diffForHumans() }}</small>

      @if(auth()->id() === $comment->user_id)
        <div class="flex gap-2 mt-3">
          <a href="{{ route('comments.edit', $comment->id) }}"
             class="px-3 py-1 border border-blue-600 text-blue-600 dark:text-blue-400 rounded hover:bg-blue-600 hover:text-white transition text-sm">
            Edit
          </a>
          <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
              class="px-3 py-1 border border-red-600 text-red-600 dark:text-red-400 rounded hover:bg-red-600 hover:text-white transition text-sm">
              Delete
            </button>
          </form>
        </div>
      @endif
    </div>
  @endforeach

  @auth
    <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mt-6">
      @csrf
      <div class="mb-4">
        <textarea name="body"
          class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
          rows="3"
          placeholder="Add a comment..."></textarea>
      </div>
      <button type="submit"
        class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition text-sm">
        Post Comment
      </button>
    </form>
  @endauth
</div>
