@extends('layouts.guest')

@section('content')

<main class="grid  place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8 mt-[5%] h-screen">
  <div class="text-center">
    <p class="text-base font-semibold text-yellow">403</p>
    <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">You are unauthorized</h1>
    <p class="mt-6 text-base leading-7 text-gray-600">Sorry, You are unauthorized to access at this page</p>
    <div class="mt-10 flex items-center justify-center gap-x-6">
      <a href="{{ route('index') }}" class="block bg-yellow text-white font-semibold rounded-lg px-4 py-3">
        Go back home
      </a>
    </div>
  </div>
</main>

@endsection