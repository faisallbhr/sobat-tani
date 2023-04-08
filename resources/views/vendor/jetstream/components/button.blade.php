<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap px-[13.5px] py-2']) }}>
    {{ $slot }}
</button>
