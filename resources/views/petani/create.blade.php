<x-app-layout>
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <div class="py-6 max-w-4xl relative">
        <form action="{{ url('/petani/posts') }}" method="post" id="form">
            @csrf
            <div class="w-1/2">
                <p class="pb-2">Title</p>
                <input class="w-full rounded" type="text" name="title" value="{{ old('title') }}" id="title">
            </div>
            <div class="w-1/2">
                <p class="pb-2">Category</p>
                <select name="category_id" class="w-full rounded">
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
                <p class="pb-2">Gaji/perorang</p>
                <input
                    type='text'
                    class='w-full p-2 border rounded outline-none shadow-sm'
                    id='salary'
                    name="salary"
                    value="{{ old('salary') }}"
                />
            </div>
            <div class=" flex flex-col gap-2">
                <p>Alamat</p>
                <div>
                    <select name="province" id="province" class="w-1/2 rounded">
                        <option>Pilih provinsi ...</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <select name="regency" id="regency" class="w-1/2 rounded">
                        <option>Pilih kabupaten/kota ...</option>
                    </select>
                </div>
                <div>
                    <select name="district" id="district" class="w-1/2 rounded">
                        <option>Pilih kecamatan ...</option>
                    </select>
                </div>
                <div>
                    <select name="address_id" id="village" class="w-1/2 rounded">
                        <option value="">Pilih desa ...</option>
                    </select>
                </div>
                <input type="text" 
                name="address_detail" 
                id="address_detail" 
                placeholder="Detail lainnya (Cth: jalan, blok, dll)" 
                value="{{ old('address_detail') }}"
                class='w-3/4 h-20 p-2 border rounded outline-none shadow-sm'>
            </div>
            <div class="py-4">
                <p>Jobdesk</p>
                <input type="hidden" name="body" value="{{ old('body') }}" id="body">
                <trix-editor input="body"></trix-editor>
            </div>
        </form>
        <x-jet-validation-errors class="mt-4" />  
        <div class="flex justify-end gap-2">
            <a href="{{ url('/petani/posts') }}"><button class="mt-4 bg-gray-400 px-4 py-2 text-gray-700 font-medium rounded text-sm hover:bg-gray-500 hover:text-gray-300">Batal</button></a>
            <x-jet-button class="mt-4" type='submit' form='form'>Buat postingan</x-jet-button>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault()
    });

    $(function(){
        $('#province').on('change', function(){
            let provinceId = $('#province').val()
            
            $.ajax({
                type: 'POST',
                url: '{{ route('getregency') }}',
                data: {provinceId: provinceId},
                cache: false,

                success: function(msg){
                    $('#regency').html(msg)
                    $('#district').html("<option>Pilih kecamatan ...</option>")
                    $('#village').html("<option>Pilih desa ...</option>")
                },
                error: function(e){
                    console.log(e);
                }
            })
        })
    })
    $('#regency').on('change', function(){
        let regencyId = $('#regency').val()
        
        $.ajax({
            type: 'POST',
            url: '{{ route('getdistrict') }}',
            data: {regencyId: regencyId},
            cache: false,

            success: function(msg){
                $('#district').html(msg)
                $('#village').html("<option>Pilih desa ...</option>")
            },
            error: function(e){
                console.log(e);
            }
        })
    })
    $('#district').on('change', function(){
        let districtId = $('#district').val()
        
        $.ajax({
            type: 'POST',
            url: '{{ route('getvillage') }}',
            data: {districtId: districtId},
            cache: false,

            success: function(msg){
                $('#village').html(msg)
            },
            error: function(e){
                console.log(e);
            }
        })
    })
</script>

</x-app-layout>