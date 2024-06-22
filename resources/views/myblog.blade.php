<x-layout>
    <x-slot:title>
        My Blog
    </x-slot:title>

    <x-slot:header>
        <form action="addBlog">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Add Blog</button>
        </form>
    </x-slot:header>

    <div >
        @foreach ($posts as $post)
        <article class="py-8 max-w-screen-md border-b border-gray-300 ">
            <a href="/posts/{{ $post ['slug'] }}" class="hover:underline">
                <h2  class= "mb-1 text-3xl tracking-tight font-bold text-gray-900 ">{{ $post ['title'] }}</h2>
            </a>
            <div>
                By
                <a href="/authors/{{ $post->author->username }}" class="text-base text-gray-500 hover:underline">{{ $post->author->name }}</a>
                in
                <a href="/categories/{{ $post->category->slug }}" class="text-base text-gray-500 hover:underline">{{ $post->category->name }}</a> | {{ $post->created_at->format('l, j F Y') }}
            </div>
            <p class="my-4 font-light">{!! Str::limit($post ['body'], 150) !!}</p>
            <a href="/posts/{{ $post ['slug'] }}" class="text-base text-medium text-blue-400 hover:underline">Read more &raquo;</a>
        </article>
        @endforeach
    </div>
</x-layout>
