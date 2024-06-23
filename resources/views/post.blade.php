<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
            <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/posts" class="font-medium text-sm text-blue-400 hover:underline">&laquo; Back to post</a>
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 rounded-full" src="{{ $post->author->photo ? asset($post->author->photo) : asset('img/avatar.png') }}" alt="{{ $post->author->name }} avatar" >
                            <div>
                                <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                                <p class="text-base text-gray-500 dark:text-gray-400">{{ $post->created_at->format('l, j F Y') }}</p>
                                <a href="/categories/{{ $post->category->slug }}" rel="category" class="bg-{{ $post->category->color }}-200 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">{{ $post->category->name }}</a>
                            </div>
                        </div>
                    </address>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $post['title'] }}</h1>
                </header>
                <p class="my-4 font-light">{!! $post['body'] !!}</p>
                <a href="/posts" class="text-base text-medium text-blue-400 hover:underline">&laquo; Back to post</a>
                <div class="absolute right-20 mb-4 mr-4 space-x-2">
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
        </div>
    </main>
</x-layout>
