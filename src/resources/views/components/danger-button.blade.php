<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full block bg-red-800 text-white font-semibold rounded-lg px-4 py-3 mt-6']) }}>
    {{ $slot }}
</button>
