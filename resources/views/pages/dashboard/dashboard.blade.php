<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl">

        <!-- Dashboard actions -->
        <div class="grid gap-8">
          @can('buruh tani')
            <div class="relative min-w-80">
              <div class="flex hover items-center p-8 bg-white shadow-lg rounded-lg z-10">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-primary bg-purple-100 rounded-full mr-6">
                  <i class="fa-solid fa-chalkboard-user scale-150"></i>
                </div>
                <div>
                  <span class="block text-2xl font-bold">{{ $regis_vacancy }}</span>
                  <span class="block text-gray-500">Menunggu persetujuan</span>
                </div>
              </div>
              <div class="w-[100%] action bg-slate-50 shadow-md h-full rounded-lg absolute left-2 -bottom-3 -z-10 transition-all"></div>
            </div>
            <div class="relative min-w-80">
              <div class="flex hover items-center p-8 bg-white shadow-lg rounded-lg z-10">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-primary bg-purple-100 rounded-full mr-6">
                  <i class="fa-solid fa-check-to-slot scale-150"></i>
                </div>
                <div>
                  <span class="block text-2xl font-bold">{{ $acc_vacancy }}</span>
                  <span class="block text-gray-500">Pekerjaan diterima</span>
                </div>
              </div>
              <div class="w-[100%] action bg-slate-50 shadow-md h-full rounded-lg absolute left-2 -bottom-3 -z-10 transition-all"></div>
            </div>
            <div class="relative min-w-80">
              <div class="flex hover items-center p-8 bg-white shadow-lg rounded-lg z-10">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-primary bg-purple-100 rounded-full mr-6">
                  <i class="fa-solid fa-person-digging"></i>
                </div>
                <div>
                  <span class="block text-2xl font-bold">{{ $progress }}</span>
                  <span class="block text-gray-500">Pekerjaan yang sedang dikerjakan</span>
                </div>
              </div>
              <div class="w-[100%] action bg-slate-50 shadow-md h-full rounded-lg absolute left-2 -bottom-3 -z-10 transition-all"></div>
            </div>
            <div class="relative min-w-80">
              <div class="flex hover items-center p-8 bg-white shadow-lg rounded-lg z-10">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-primary bg-purple-100 rounded-full mr-6">
                  <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                </div>
                <div>
                  <span class="block text-2xl font-bold">{{ $done }}</span>
                  <span class="block text-gray-500">Pekerjaan yang selesai dikerjakan</span>
                </div>
              </div>
              <div class="w-[100%] action bg-slate-50 shadow-md h-full rounded-lg absolute left-2 -bottom-3 -z-10 transition-all"></div>
            </div>
          @endcan

          
          @can('petani')
            <div class="relative min-w-80">
              <div class="flex hover items-center p-8 bg-white shadow-lg rounded-lg z-10">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-primary bg-purple-100 rounded-full mr-6">
                  <i class="fa-solid fa-door-open scale-150"></i>
                </div>
                <div>
                  <span class="block text-2xl font-bold">{{ $vacancies_open }}</span>
                  <span class="block text-gray-500">Lowongan dibuka</span>
                </div>
              </div>
              <div class="w-[100%] action bg-slate-50 shadow-md h-full rounded-lg absolute left-2 -bottom-3 -z-10 transition-all"></div>
            </div>
            <div class="relative min-w-80">
              <div class="flex hover items-center p-8 bg-white shadow-lg rounded-lg z-10">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-primary bg-purple-100 rounded-full mr-6">
                  <i class="fa-solid fa-door-closed scale-150"></i>
                </div>
                <div>
                  <span class="block text-2xl font-bold">{{ $vacancies_closed }}</span>
                  <span class="block text-gray-500">Lowongan ditutup</span>
                </div>
              </div>
              <div class="w-[100%] action bg-slate-50 shadow-md h-full rounded-lg absolute left-2 -bottom-3 -z-10 transition-all"></div>
            </div>
            <div class="relative min-w-80">
              <div class="flex hover items-center p-8 bg-white shadow-lg rounded-lg z-10">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-primary bg-purple-100 rounded-full mr-6">
                  <i class="fa-solid fa-book scale-150"></i>
                </div>
                <div>
                  <span class="block text-2xl font-bold">@currency($books)</span>
                  <span class="block text-gray-500">Pengeluaran bulan ini</span>
                </div>
              </div>
              <div class="w-[100%] action bg-slate-50 shadow-md h-full rounded-lg absolute left-2 -bottom-3 -z-10 transition-all"></div>
            </div>
            @endcan

            @can('admin')
            <div class="relative min-w-80">
              <div class="flex hover items-center p-8 bg-white shadow-lg rounded-lg z-10">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-primary bg-purple-100 rounded-full mr-6">
                  <i class="fa-regular fa-face-meh-blank scale-150"></i>
                </div>
                <div>
                  <span class="block text-2xl font-bold">{{ $admin_wait }}</span>
                  <span class="block text-gray-500">Menunggu persetujuan bukti pembayaran</span>
                </div>
              </div>
              <div class="w-[100%] action bg-slate-50 shadow-md h-full rounded-lg absolute left-2 -bottom-3 -z-10 transition-all"></div>
            </div>
            <div class="relative min-w-80">
              <div class="flex hover items-center p-8 bg-white shadow-lg rounded-lg z-10">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-primary bg-purple-100 rounded-full mr-6">
                  <i class="fa-regular fa-face-laugh-beam scale-150"></i>
                </div>
                <div>
                  <span class="block text-2xl font-bold">{{ count($admin_acc) }}</span>
                  <span class="block text-gray-500">Bukti pembayaran telah disetujui</span>
                </div>
              </div>
              <div class="w-[100%] action bg-slate-50 shadow-md h-full rounded-lg absolute left-2 -bottom-3 -z-10 transition-all"></div>
            </div>
            <div class="relative min-w-80">
              <div class="flex hover items-center p-8 bg-white shadow-lg rounded-lg z-10">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-primary bg-purple-100 rounded-full mr-6">
                  <i class="fa-solid fa-sack-dollar scale-150"></i>
                </div>
                <div>
                  {{ $admin_acc }}
                  <span class="block text-2xl font-bold">@currency(count($admin_acc)*5000)</span>
                  <span class="block text-gray-500">Total keuntungan</span>
                </div>
              </div>
              <div class="w-[100%] action bg-slate-50 shadow-md h-full rounded-lg absolute left-2 -bottom-3 -z-10 transition-all"></div>
            </div>
            @endcan

    </div>

    <script>
      const hover = document.querySelectorAll('.hover')
      const action = document.querySelectorAll('.action')
      for(let i=0;i<hover.length;i++){
        hover[i].addEventListener('mouseover', function(){
          action[i].classList.add('card')
        })
        hover[i].addEventListener('mouseout', function(){
          action[i].classList.remove('card')
        })
      }
    </script>
    
</x-app-layout>
