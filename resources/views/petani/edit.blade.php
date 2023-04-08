<x-app-layout>
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <div class="py-6 max-w-4xl relative">

        <form action="/petani/posts/{{ $post->slug }}" method="post">
            @method('put')
            @csrf
            <div class="w-1/2">
                <p class="pb-2">Title</p>
                <input class="w-full rounded-md dark:text-dark-eval-0" type="text" name="title" value="{{ old('title', $post->title) }}" id="title">
            </div>
            <div class="w-1/2 py-4">
                <p class="pb-2">Slug</p>
                <input class="w-full rounded-md dark:text-dark-eval-0" type="text" name="slug" value="{{ old('slug', $post->slug) }}" id="slug">
            </div>
            <div class="w-1/2">
                <p class="pb-2">Category</p>
                <select name="category_id" class="w-full rounded-md dark:text-dark-eval-0">
                    @foreach ($categories as $category)
                        @if (old('category_id') == $category->id)
                            <option  value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option  value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="py-4">
                <p>Jobdesk</p>
                <input type="hidden" name="body" value="{{ old('body', $post->body) }}" id="body">
                <trix-editor input="body"></trix-editor>
            </div>
            <div class="flex justify-end gap-2">
                <button class="mt-4 bg-gray-400 px-4 text-gray-700 font-medium rounded text-sm hover:bg-gray-500 hover:text-gray-300"><a href="/petani/posts">Batal</a></button>
                <x-jet-button class="mt-4" type='submit'>Edit postingan</x-jet-button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>