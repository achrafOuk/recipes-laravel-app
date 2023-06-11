@extends('layouts/guest')
@section('content')
    <div class="grow-1 m-[5%]" style="flex-grow: 1;">
        <div class="flex flex-row w-full">
            @include("components/search-favorite")
            <div clas="flex row w-[80%]" style=" width: 100%;">
                <h1 class="font-bold text-3xl">Favorite recipes</h1>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($meals as $meal)
                        <x-meal-card :meal="$meal->meal"/>
                    @endforeach
            </div>
            @if($meals->count()) 
                @include("components/pagination") 
            @else
                you don't have any favorite recipes
            @endif 
        </div>
        </div>
    </div>
@endsection
