<x-app-layout>
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <div class="py-6 max-w-xl relative">
        <form action="/petani/books/{{ $book->slug }}" method="post" id="form">
            @method('put')
            @csrf
            <div class=" py-2">
                <p>Aktivitas</p>
                <input class="w-full rounded" type="text" name="activity" value="{{ old('activity', $book->activity) }}" id="activity">
            </div>
            <div class=" py-2">
                <p>Biaya</p>
                <input
                    type='text'
                    class='w-full border rounded outline-none shadow-sm'
                    id='cost'
                    name="cost"
                    value="{{ old('cost', $book->cost) }}"
                />
            </div>
            <div class="py-2">
                <p>Tanggal</p>
                <input type="date" name="date" id="date" class="w-full rounded" value="{{ old('date', $book->date) }}">
            </div>
        </form>
        <div class="flex justify-end gap-2">
            <a href="{{ url('/petani/books') }}"><button class="mt-4 bg-white border border-primary text-primary px-4 py-2 font-medium rounded text-sm">Batal</button></a>
            <button class="mt-4 bg-primary border border-primary text-white px-4 py-2 font-medium rounded text-sm" type='submit' form='form'>Edit postingan</button>
        </div>
    </div>
</div>
</x-app-layout>
