@extends('layouts/guest')
@section('content')
    <div class="m-[5%]">
        <div class="flex flex-row w-full">
            @include("components/search")
            <div clas="flex row w-[80%]" style=" width: 100%;">
                <i class="icon-settings"></i>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($meals as $meal)
                        <x-meal-card :meal="$meal"/>
                    @endforeach
            </div>
            @if($meals->count()) 
                @include("components/pagination") 
            @else
                No result were found
            @endif 
        </div>
        </div>
    </div>
@endsection




