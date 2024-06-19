<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <article class="py-8 max-w-screen-md border-b border-gray-300 ">
        <a href="/posts/{{ $post ['slug'] }}" class="hover:underline">
            <h2  class= "mb-1 text-3xl tracking-tight font-bold text-gray-900 ">{{ $post ['title'] }}</h2>
        </a>
        <div >
            By
            <a href="/authors/{{ $post->author->username }}" class="text-base text-gray-500 hover:underline">{{ $post->author->name }}</a>
            in
            <a href="/categories/{{ $post->category->slug }}" class="text-base text-gray-500 hover:underline">{{ $post->category->name }}</a> | {{ $post->created_at->format('l, j F Y') }}
        </div>
        <p class="my-4 font-light">{{$post ['body']}}</p>
        <a href="/posts/" class="text-medium text-blue-400 hover:underline">&laquo; Back to post</a>
    </article>
</x-layout>

   
   