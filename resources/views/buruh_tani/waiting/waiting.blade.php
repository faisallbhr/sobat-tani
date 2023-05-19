<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-5xl">
        <ul class="flex gap-4">
            <li onclick="openCity(event, 'tabs-1')" class="tablinks text-slate-900 text-slate-400 cursor-pointer px-2 py-1 rounded-md mb-2 bg-white shadow">Belum disetujui</li>
            <li onclick="openCity(event, 'tabs-2')" class="tablinks text-slate-400 cursor-pointer px-2 py-1 rounded-md mb-2">Sudah disetujui</li>
        </ul>
        <table id="tabs-1" class="tabcontent text-left text-sm font-light overflow-hidden rounded-md w-full">
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
        <table id="tabs-2" class="tabcontent text-left text-sm font-light overflow-hidden rounded-md w-full hidden">
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
                @foreach ($accepted as $acc)
                    <tr class="border-b border-neutral-500 bg-neutral-200">
                        <td class="px-6 py-4 text-slate-800 font-medium ">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-slate-800">{{ $acc->title }} </td>
                        <td class="px-6 py-4 text-slate-800">{{ $acc->category->name }}</td>
                        <td class="py-4  text-slate-800 px-6 whitespace-nowrap  text-center">
                            <p class="bg-green-500 text-xs px-4 py-2 font-semibold rounded inline-block ">Telah disetujui</p>
                        </td>
                        <td class="py-4  text-slate-800 whitespace-nowrap px-6 text-center">
                            <a href="{{ url('/buruhtani/wait/'.$acc->slug) }}" class="bg-blue-500 hover:bg-blue-600 text-xs px-4 py-2 font-semibold rounded">Lihat detail
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function openCity(evt, btnName) {
        // Declare all variables
        // let i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        const tabcontent = document.getElementsByClassName("tabcontent");
        for (let i = 0; i < tabcontent.length; i++) {
            tabcontent[i].classList.add('hidden')
        }

        // Get all elements with class="tablinks" and remove the class "active"
        const tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove('bg-white')
            tablinks[i].classList.remove('text-slate-900')
            tablinks[i].classList.remove('shadow')
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        // document.getElementById(btnName).classList.add('flex');
        document.getElementById(btnName).classList.remove('hidden');
        evt.currentTarget.className += " bg-white text-slate-900 shadow";
        }
    </script>
</x-app-layout>