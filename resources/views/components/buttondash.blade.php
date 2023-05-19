<div class="flex justify-center">
    <button {{ $attributes->merge(['type' => 'submit',  'class' => 'inline-flex items-center  px-2 py-3 bg-amber-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-600 focus:bg-amber700 active:bg-amber-900 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>
</div>