<div class="mt-5 flex justify-end gap-4">
  <form 
    action="{{ $post->isLikedBy(auth()->user()) 
                ? route('posts.unlike', $post) 
                : route('posts.like', $post) }}" 
    method="POST" 
    class="inline"
  >
    @csrf

    @if ($post->isLikedBy(auth()->user()))
      @method('DELETE')
      <button type="submit"
        class="inline-flex items-center gap-2 px-3 py-1 border border-blue-600 text-blue-600 dark:text-blue-400 rounded-full hover:bg-blue-600 hover:text-white transition text-sm">
        Unlike
        <i class="bi bi-hand-thumbs-down"></i>
      </button>
    @else
      <button type="submit"
        class="inline-flex items-center gap-2 px-3 py-1 border border-blue-600 text-blue-600 dark:text-blue-400 rounded-full hover:bg-blue-600 hover:text-white transition text-sm">
        Like
        <i class="bi bi-hand-thumbs-up"></i>
      </button>
    @endif

    @if ($post->likes->count() > 0)
      <span
        class="inline-flex items-center gap-1 px-3 py-1 border border-blue-600 text-blue-600 dark:text-blue-400 rounded-full text-sm">
        <i class="bi bi-hand-thumbs-up"></i>
        {{ $post->likes->count() }}
      </span>
    @else
      <span
        class="inline-flex items-center gap-1 px-3 py-1 bg-blue-600 text-white rounded-full text-sm">
        0
      </span>
    @endif
  </form>
</div>
