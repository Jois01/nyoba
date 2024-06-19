<x-layout>
    <x-slot:title>
        My Blog
    </x-slot:title>

    <x-slot:header>
        <form action="addBlog">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Add Blog</button>
        </form>
    </x-slot:header>

    <div>
        @foreach ($posts as $post)
            <article class="mb-6 p-4 bg-white rounded-lg shadow-md">
                <h2 class="text-2xl font-bold">{{ $post->title }}</h2>
                <p class="text-gray-700">{{ $post->author }}</p>
                <div class="mt-2 text-gray-900">{{ $post->body }}</div>
                <a href="/posts/{{ $post->id }}" class="text-blue-500 hover:underline mt-4 inline-block">Read more</a>
            </article>
        @endforeach
    </div>
</x-layout>
