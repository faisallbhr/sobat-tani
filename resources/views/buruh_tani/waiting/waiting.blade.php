<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-5xl">
        <table id="tableId" class="text-left text-sm font-light overflow-hidden rounded-md w-full">
            <thead
                class="border-b bg-white font-medium">
                <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">Judul</th>
                    <th class="px-6 py-4">Category</th>
                    <th class="text-center py-4">Status</th>
                    <th class="text-center py-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($waiting as $wait)
                    <tr class="border-b border-neutral-500 bg-neutral-200">
                        <td class="px-6 py-4 text-slate-800 font-medium ">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-slate-800">{{ $wait->title }} </td>
                        <td class="px-6 py-4 text-slate-800">{{ $wait->category->name }}</td>
                        <td class="py-4  text-slate-800 px-6 whitespace-nowrap  text-center">
                            <p class="bg-yellow-500 text-xs px-4 py-2 font-semibold rounded inline-block ">Menunggu persetujuan</p>
                        </td>
                        <td class="py-4  text-slate-800 whitespace-nowrap px-6 text-center">
                            <a href="{{ url('/buruhtani/wait/'.$wait->slug) }}" class="bg-blue-500 hover:bg-blue-600 text-xs px-4 py-2 font-semibold rounded">Lihat detail
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>