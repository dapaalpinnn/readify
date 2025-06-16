<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight">
      {{ __('Kelola Artikel') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          @if (auth()->user()->role->name !== 'writer')
          <a href="{{ route('articles.create') }}"
            class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md mb-4">Buat Artikel Baru</a>
          @else
          <a href="{{ route('articles.create') }}"
            class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md mb-4">Buat Artikel Baru</a>
          @endif
          @if ($articles->isEmpty())
          <p class="text-gray-600 dark:text-gray-400">Belum ada artikel.</p>
          @else
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>
                <th class="px-6 py-3">Judul</th>
                <th class="px-6 py-3">Kategori</th>
                <th class="px-6 py-3">Penulis</th>
                <th class="px-6 py-3">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($articles as $article)
              <tr class="bg-white border-b">
                <td class="px-6 py-4 text-gray-700">{{ $article->title }}</td>
                <td class="px-6 py-4 text-gray-700">{{ $article->category->name }}</td>
                <td class="px-6 py-4 text-gray-700">{{ $article->author->user->name }}</td>
                <td class="px-6 py-4">
                  <a href="{{ route('articles.show', $article) }}"
                    class="text-blue-600 dark:text-blue-400 hover:underline">Lihat</a>
                  @if (auth()->user()->role->name === 'admin' ||
                  (auth()->user()->role->name === 'writer' && $article->author_id === auth()->user()->author->id))
                  <a href="{{ route('articles.edit', $article) }}"
                    class="text-yellow-600 dark:text-yellow-400 hover:underline ml-2">Edit</a>
                  <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 dark:text-red-400 hover:underline ml-2"
                      onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                  </form>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="mt-4">
            {{ $articles->links() }}
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>