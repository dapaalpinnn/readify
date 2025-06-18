<x-app-layout>
  <div class="container mx-auto px-4 py-2">
    <div class="max-w-6xl mb-10 mx-auto flex justify-between items-center">
      <h1 class="max-w-4xl text-5xl text-gray-900 mb-4 font-breilga">
        {{ __('Artikel Kamu') }}
      </h1>
      <a href="{{ route('articles.create') }}"
        class="inline-block px-4 py-2 bg-blue-600 text-white text-sm rounded-md font-semibold">Buat Artikel Baru</a>
    </div>

    @if ($articles->isEmpty())
    <p class="text-gray-600 dark:text-gray-400 text-center">Belum ada artikel tersedia.</p>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
      @foreach ($articles as $article)
      <div class="bg-white border border-gray-200 rounded-2xl shadow-lg overflow-hidden flex flex-col">
        @if ($article->image)
        <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $article->image) }}"
          alt="{{ $article->title }}">
        @else
        <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
          <span class="text-gray-500 dark:text-gray-400">No Image</span>
        </div>
        @endif

        <div class="p-4 flex flex-col flex-1 justify-between">
          <div>
            <div class="flex justify-between">
              <span class="inline-block bg-blue-100 text-blue-500 text-xs font-semibold px-2.5 py-0.5 rounded mb-2">
                {{ $article->category->name }}
              </span>
              <p class="text-sm text-gray-500 font-medium mb-2">{{ $article->created_at->format('d M Y') }}</p>
            </div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-800 leading-snug tracking-wide my-2 !font-breilga">
              <a href="{{ route('articles.show', $article) }}">
                {{ \Illuminate\Support\Str::limit($article->title, 50) }}
              </a>
            </h3>
            <p class="text-gray-700 dark:text-gray-500 tracking-normal">
              {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 100) }}
            </p>
          </div>

          <div class="flex items-center justify-between mt-4 text-sm text-gray-500 dark:text-gray-400">
            <div class="flex items-center space-x-2">
              <img src="https://ui-avatars.com/api/?name={{ urlencode($article->author->user->name) }}&size=32"
                alt="Avatar" class="w-8 h-8 rounded-full">
              <span>By {{ $article->author->user->name }}</span>
            </div>

            <div class="flex mt-4 space-x-2 justify-end items-center">
              <a href="{{ route('articles.show', $article) }}"
                class="inline-flex items-center text-blue-600 hover:underline">
                <svg class="fi-link-icon h-4 w-4 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                  <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"></path>
                  <path fill-rule="evenodd"
                    d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                    clip-rule="evenodd"></path>
                </svg>
              </a>
              <a href="{{ route('articles.edit', $article) }}"
                class="text-yellow-600 dark:text-yellow-400 hover:underline text-sm"><svg
                  style="--c-400:var(--primary-400);--c-600:var(--primary-600);"
                  class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                  <path
                    d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z">
                  </path>
                  <path
                    d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z">
                  </path>
                </svg></a>
              <form action="{{ route('articles.destroy', $article) }}" method="POST"
                onsubmit="return confirm('Yakin ingin menghapus?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 dark:text-red-400 hover:underline text-sm"><svg
                    style="--c-400:var(--danger-400);--c-600:var(--danger-600);" wire:loading.remove.delay.default="1"
                    wire:target="mountTableAction('delete', '2')"
                    class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                    data-slot="icon">
                    <path fill-rule="evenodd"
                      d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z"
                      clip-rule="evenodd"></path>
                  </svg></button>
              </form>
            </div>
          </div>

        </div>
      </div>
      @endforeach
    </div>

    <div class="mt-8">
      {{ $articles->links() }}
    </div>
    @endif
  </div>
</x-app-layout>