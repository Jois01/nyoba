<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <article class="py-8 max-w-screen-md border-b border-gray-300 relative">
       
        <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
        </a>
        <div>
            By
            <a href="/authors/{{ $post->author->username }}" class="text-base text-gray-500 hover:underline">{{ $post->author->name }}</a>
            in
            <a href="/categories/{{ $post->category->slug }}" class="text-base text-gray-500 hover:underline">{{ $post->category->name }}</a> | {{ $post->created_at->format('l, j F Y') }}
        </div>
        <div class="my-4 font-light">{!! $post['body'] !!}</div>
        <a href="/posts/{{ $post['slug'] }}" class="text-base text-medium text-blue-400 hover:underline">&laquo; Back to post</a>
        
        <div class="absolute bottom-0 right-0 mb-4 mr-4 space-x-2">
            @can('update', $post)
                <a href="{{ route('posts.edit', $post->slug) }}" class="bg-yellow-400 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 inline-block">Edit</a>
            @endcan
            
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post->slug) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 inline-block">Hapus</button>
                </form>
            @endcan
        </div>
    </article>
</x-layout>
