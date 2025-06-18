<x-app-layout>
  <div class="max-w-4xl mx-auto px-4 py-6">

    <h1 class="text-[2.8rem] text-gray-900 dark:text-gray-800 leading-snug mb-2 !font-breilga">
      {{ $article->title }}
    </h1>

    <div class="flex items-center text-sm text-gray-500 dark:text-gray-600 mb-6 flex-wrap gap-2">
      <span class="inline-block">Kategori: <strong>{{ $article->category->name }}</strong></span>
      <span class="hidden sm:inline-block">|</span>
      <span class="inline-block">Penulis: <strong>{{ $article->author->user->name }}</strong></span>
      <span class="hidden sm:inline-block">|</span>
      <span class="inline-block">Dipublikasikan: {{ $article->created_at->format('d M Y') }}</span>
    </div>

    @if ($article->image)
    <img class="w-full h-64 object-cover rounded-lg mb-6" src="{{ asset('storage/' . $article->image) }}"
      alt="{{ $article->title }}" />
    @else
    <div class="w-full h-64 bg-gray-200 dark:bg-gray-700 flex items-center justify-center rounded-lg mb-6">
      <span class="text-gray-500 dark:text-white-400">No Image</span>
    </div>
    @endif

    <div class="prose dark:prose-invert max-w-none mb-10 text-xl leading-relaxed !font-jomolhari">
      {!! nl2br(e($article->content)) !!}
    </div>

    <section class="mt-12">
      <h2 class="text-lg  text-gray-900 dark:text-gray-600 mb-4">Komentar</h2>

      @php
      function consistentColorHex($string)
      {
      return substr(md5($string), 0, 6);
      }
      @endphp


      @if ($article->comments->isEmpty())
      <p class="text-gray-600 dark:text-gray-400">Belum ada komentar.</p>
      @else
      <ul class="space-y-2">
        @foreach ($article->comments as $comment)
        <li class="flex gap-4 items-start p-2 rounded-xl border-b border-gray-300">
          <img
            src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name) }}&size=64&background={{ consistentColorHex($comment->user->name) }}&color=ffffff"
            alt="{{ $comment->user->name }}" class="w-10 h-10 rounded-full shadow" />
          <div>
            <div class="flex items-center justify-between mb-1">
              <span class="text-gray-600">{{ $comment->user->name }}</span>
              <span class="ml-4 text-xs text-gray-500">{{ $comment->created_at->format('d M Y H:i') }}</span>
            </div>
            <p class="text-sm text-gray-500">{{ $comment->content }}</p>
          </div>
        </li>
        @endforeach
      </ul>
      @endif
    </section>

    @auth
    <section class="mt-12">
      <form method="POST" action="{{ route('comments.store') }}" class="space-y-4">
        @csrf
        <input type="hidden" name="article_id" value="{{ $article->id }}">

        <div>
          <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-600 mb-2">
            Komentar Anda
          </label>
          <textarea id="content" name="content" rows="4"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-300 dark:bg-white shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500"
            required placeholder="Tulis komentar kamu ..."></textarea>
          @error('content')
          <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <button type="submit"
          class="inline-flex items-center px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
          Kirim Komentar
        </button>
      </form>
    </section>
    @else
    <p class="mt-12 text-gray-600 dark:text-gray-400">
      <a href="{{ route('login') }}" class="text-blue-600 hover:underline dark:text-blue-400 font-semibold">
        Masuk
      </a> untuk memberikan komentar pada artikel ini.
    </p>
    @endauth
  </div>
</x-app-layout>