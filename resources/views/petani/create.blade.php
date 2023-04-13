<x-app-layout>
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <div class="py-6 max-w-4xl relative">
        <form action="{{ url('/petani/posts') }}" method="post" id="form">
            @csrf
            <div class="w-1/2">
                <p class="pb-2">Title</p>
                <input class="w-full rounded-md" type="text" name="title" value="{{ old('title') }}" id="title">
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
            <div class="w-1/2 py-4">
                <p class="pb-2">Gaji</p>
                <input
                    type='number'
                    onchange="this.value = parseInt(this.value);"
                    class='w-full p-2 border rounded-md outline-none shadow-sm'
                    id='salary'
                    name="salary"
                />
            </div>
            <div class="py-4">
                <p>Alamat</p>
                <input type="text" name="address" id="address" class='w-3/4 h-20 p-2 border rounded-md outline-none shadow-sm'>
            </div>
            <div class="py-4">
                <p>Jobdesk</p>
                <input type="hidden" name="body" value="{{ old('body') }}" id="body">
                <trix-editor input="body"></trix-editor>
            </div>
        </form>
        <div class="flex justify-end gap-2">
            <a href="{{ url('/petani/posts') }}"><button class="mt-4 bg-gray-400 px-4 py-2 text-gray-700 font-medium rounded text-sm hover:bg-gray-500 hover:text-gray-300">Batal</button></a>
            <x-jet-button class="mt-4" type='submit' form='form'>Buat postingan</x-jet-button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault()
    });
</script>
</x-app-layout>
