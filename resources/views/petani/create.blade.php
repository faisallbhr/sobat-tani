<x-app-layout>
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <div class="py-6 max-w-4xl relative">
        <form action="/petani/posts" method="post">
            @csrf
            <div class="w-1/2">
                <p class="pb-2">Title</p>
                <input class="w-full rounded-md" type="text" name="title" value="{{ old('title') }}" id="title">
            </div>
            <div class="w-1/2 py-4">
                <p class="pb-2">Slug</p>
                <input class="w-full rounded-md" type="text" name="slug" value="{{ old('slug') }}" id="slug">
            </div>
            <div class="w-1/2">
                <p class="pb-2">Category</p>
                <select name="category_id" class="w-full rounded-md">
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
                <input type="hidden" name="body" value="{{ old('body') }}" id="body">
                <trix-editor input="body"></trix-editor>
            </div>

            <x-jet-button class="mt-4 absolute right-0" type='submit'>Buat postingan</x-jet-button>

        </form>
    </div>
</div>

<script>
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault()
    })
</script>
</x-app-layout>
