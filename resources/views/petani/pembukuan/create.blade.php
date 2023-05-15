<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="py-6 max-w-xl relative">
            <form action="{{ url('/petani/books') }}" method="post" id="form">
                @csrf
                <div class=" py-2">
                    <p>Aktivitas</p>
                    <input class="w-full rounded" type="text" name="activity" value="{{ old('activity') }}" id="activity">
                </div>
                <div class=" py-2">
                    <p>Biaya</p>
                    <input
                        type='text'
                        class='w-full rounded'
                        id='cost'
                        name="cost"
                        value="{{ old('cost') }}"
                    />
                </div>
                <div class="py-2">
                    <p>Tanggal</p>
                    <input type="date" name="date" id="date" class="w-full rounded">
                </div>
            </form>
            <x-jet-validation-errors class="mt-4" />  
            <div class="flex justify-end gap-2">
                <a href="{{ url('/petani/books') }}"><button class="mt-4 bg-gray-400 px-4 py-2 text-gray-700 font-medium rounded text-sm hover:bg-gray-500 hover:text-gray-300">Batal</button></a>
                <x-jet-button class="mt-4" type='submit' form='form'>Buat catatan</x-jet-button>
            </div>
        </div>
    </div>
</x-app-layout>