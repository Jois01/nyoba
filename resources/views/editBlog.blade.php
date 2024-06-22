<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
  
    <form action="{{ route('posts.update', $post->slug) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
              <div class="mt-2">
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
              <div class="mt-2">
                <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required readonly>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="category_id" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
              <div class="mt-2">
                <select name="category_id" id="category_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-span-full">
              <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Your Blog Description</label>
              <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about anything you like.</p>
              <div class="mt-2">
                <textarea id="summernote" name="body" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>{{ old('body', $post->body) }}</textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>
    </form>
    <script>
        $('#summernote').summernote({
          placeholder: 'Edit your blog post here',
          tabsize: 2,
          height: 120,
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
          ]
        });
  
      const titleInput = document.querySelector('#title');
      const slugInput = document.querySelector('#slug');
      titleInput.addEventListener('change', function(){
        fetch('/posts/post/checkSlug?title=' + titleInput.value)
          .then(response => response.json())
          .then(data => slugInput.value = data.slug)
      });
    </script>
  </x-layout>
  