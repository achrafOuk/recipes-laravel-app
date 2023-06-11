<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full block bg-yellow  text-white font-semibold rounded-lg px-4 py-3 mt-6']) }}>
    {{ $slot }}
</button>
