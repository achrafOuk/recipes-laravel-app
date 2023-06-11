@extends('layouts/guest')
@section('content')


<div class="mt-[5%] m-0 md:m-[5%] md:w-[90%]">
    @include('components.alert')
    <div class="flex flex-row">
        <x-search-component  action="{{route('seach-meals-dashboard')}}" :searchTerm="empty($searchTerm) ? '': $searchTerm" :areas="$areas" :categories="$categories" /> 
        <div class="flex flex-col w-full md:w-[80%] ">
            <a href="{{route('create-meal')}}" >
                <button class="bg-yellow p-5 text-white mb-5 w-fit whitespace-nowrap">
                    add new recipe
                </button>
            </a>

        <div class="overflow-x-auto mb-5">
        <table class="table-auto border-collapse border border-gray-400 xl:w-full">
            <thead>
                <tr>
                    @foreach($columns as $column)
                        <th scope="col" class="px-4 py-2 text-gray-800">
                            {{ $column }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>

            @foreach($meals as $meal)
                <tr class="bg-black text-white border-b ">
                    <td scope="row" class="border px-4 py-2">
                        {{ $meal->id }}
                    </th>
                    <td class="px-6 py-4">
                        <img src=" {{ $meal->image }}" alt=" {{ $meal->name }}" class="max-w-[200px] w-[200px]" />
                    </td>
                    <td class="border px-4 py-2">
                        {{ $meal->name }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $meal->area->area_name }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $meal->category->category_name }}
                    </td>

                    <td class="border px-4 py-2">
                        <a href="{{ route('edit-meal',['slug'=>$meal->slug ]) }}">
                            <button class="bg-yellow text-white font-bold py-2 px-4 rounded mr-2">update</button>
                        </a>
                        <form method="POST" action="{{route('delete-meal',['slug'=>$meal->slug] ) }}">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        </div>

        @include("components/pagination") 
        </div>

    </div>
</div>

@endsection

