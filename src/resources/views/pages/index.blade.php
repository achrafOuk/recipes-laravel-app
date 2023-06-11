@extends('layouts/guest')
@section('content')
    <div class="m-[5%]" x-data="{open:false}">
        <div class="flex flex-row w-full">
            {{-- <x-search open="open"></x-search> --}}
            @include("components/search")
            <div :class="{'hidden md:flex md:flex-col md:w-[80%]':!open,'hidden md:flex md:flex-col md:w-[80%]':open}" style=" width: 100%;">
                <p class="icon-settings block sm:hidden" @click="open=!open" style=" padding: 1%; cursor: pointer; width: 10%; text-align: center; background: white; color: black; border: .1rem solid; ">
                </p>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-[2%]">
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




