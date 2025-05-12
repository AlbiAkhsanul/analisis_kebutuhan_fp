<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest w-52 h-14 left-0 top-0 absolute bg-red-700 rounded-[12px] shadow-[2px_2px_2px_1px_rgba(0,0,0,0.25)] absolute text-center justify-center transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
