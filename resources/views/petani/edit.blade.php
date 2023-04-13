<x-app-layout>
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <div class="py-6 max-w-4xl relative">

        <form action="/petani/posts/{{ $post->slug }}" method="post" id="form">
            @method('put')
            @csrf
            <div class="w-1/2">
                <p class="ml-1">Title</p>
                <input class="w-full rounded-md dark:text-dark-eval-0" type="text" name="title" value="{{ old('title', $post->title) }}" id="title">
                @error('title')
                    <small class="text-rose-600">{{ $message }}</small>
                @enderror
            </div>
            <div class="w-1/2 py-4 hidden">
                <p class="pb-2">Slug</p>
                <input class="w-full rounded-md dark:text-dark-eval-0" type="text" name="slug" value="{{ old('slug', $post->slug) }}" id="slug">
            </div>
            <div class="w-1/2 py-4">
                <label htmlFor='salary' class='ml-1'>Gaji</label>
                <input
                    type='number'
                    step="1"
                    onchange="this.value = parseInt(this.value);"
                    class='w-full p-2 border rounded-md outline-none shadow-sm'
                    id='salary'
                    name="salary"
                    value="{{ old('salary', $post->salary) }}"
                />
            </div>
            <div class="w-1/2">
                <p class="ml-1">Category</p>
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
                <p class="ml-1">Alamat</p>
                <input type="text" name="address" id="address" class='w-3/4 h-20 p-2 border rounded-md outline-none shadow-sm' value="{{ old('address', $post->address) }}">
            </div>
            <div class="py-4">
                <p>Jobdesk</p>
                <input type="hidden" name="body" value="{{ old('body', $post->body) }}" id="body">
                <trix-editor input="body"></trix-editor>
                @error('body')
                    <small class="text-rose-600">{{ $message }}</small>
                @enderror
            </div>
        </form>
        <div class="flex justify-end gap-2">
            <a href="{{ url('/petani/posts') }}"><button class="mt-4 bg-gray-400 px-4 py-2 text-gray-700 font-medium rounded text-sm hover:bg-gray-500 hover:text-gray-300">Batal</button></a>
            <x-jet-button class="mt-4" type='submit' form='form'>Edit postingan</x-jet-button>
        </div>
    </div>
</div>
</x-app-layout>
