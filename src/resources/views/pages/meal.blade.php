@extends('layouts/guest')
@section('content')
    <div class="container mx-auto px-4 py-8">
        @include('components.alert')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <img src="{{$meal->image}}" alt="Product Image" class="w-full">
            </div>
            <div>
            <h1 class="text-2xl font-bold mb-4">{{$meal->name}}</h1>
            <div class="flex flex-row">
                <a href="{{route('meals-by-area',['area'=> lcfirst($meal->area->area_name) ])}}" class="whitespace-nowrap">
                    <i class="icon-globe"></i>
                        {{$meal->area->area_name}} 
                </a>
                <a href="{{route('meals-by-category',['category'=> lcfirst($meal->category->category_name) ])}}" class="whitespace-nowrap">
                    <i class="icon-tag"></i>
                    {{$meal->category->category_name}} 
                </a>
            </div>

            <h1 class="font-bold">Ingredians:</h1>
            <div class="flex flex-col">
                @foreach($ingrediants as $ingredian)
                    <p>{{$ingredian}}</p>
                @endforeach
            </div>

            <h1 class="font-bold">Instructions:</h1>
            <p class="text-gray-600 mb-4">{{$meal->instructions}}</p>
            @if(!$is_favorite)
                <x-favorite-form action_route="{{route('add-favorite',['id'=>$meal->id])}}" text="Add to favorite" />
            @else
                <x-favorite-form action_route=" {{ route('remove-favorite',['id'=>$meal->id] ) }} " text="Remove from favorite" />
            @endif
            </div>
        </div>
    </div>
@endsection
