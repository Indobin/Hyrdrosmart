<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-2 py-2 
bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase 
tracking-widest hover:bg-blue-600 active:bg-blue-700  transition ease-in-out duration-300']) }}>
    {{ $slot }}
   </button>