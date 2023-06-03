<x-app-layout>
    <div id="tabs" class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl">  
        <!-- Cards -->
        <div id="tabs-1" class="tabcontent relative max-w-5xl">
            <table class="text-left text-sm font-light overflow-hidden rounded-md w-full">
                <thead
                    class="border-b bg-white font-medium">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Judul</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="flex justify-center py-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr 
                        class="border-b border-neutral-500 bg-neutral-200">
                            <td class="px-6 py-4 text-slate-800 font-medium">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-slate-800">{{ $post->title }}</td>
                            <td class="px-6 py-4 text-slate-800">{{ $post->category->name }}</td>
                            <td class="px-6 py-4  text-slate-800 flex flex-col md:flex-row gap-2 items-center justify-center">
                                <div>
                                    <a href="{{ url('/admin/posts/'.$post->slug) }}" >
                                    <button class="bg-primary px-4 py-2 rounded text-white"><span class="fa-solid fa-eye mx-auto"></span>
                                    </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>
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
