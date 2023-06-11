@props(['meal'])
<div class="flex flex-col">
    <a href="{{route('show-meal',['slug'=>$meal->slug])}}"> 
        <img src="{{$meal->image}}" class="h-[250px] max-w-full w-full rounded-xl"/> 
    </a>
    <div class="flex flex-row">
        <a href="{{route('meals-by-area',['area'=> lcfirst($meal->area->area_name) ])}}" class="whitespace-nowrap">
            <i class="icon-globe"></i>
            {{$meal->area->area_name}} 
        </a>
        <a href="{{route('meals-by-category',['category'=> lcfirst($meal->category->category_name) ])}}" class="whitespace-nowrap">
            <i class="icon-tag"></i> {{$meal->category->category_name}} 
        </a>
    </div>
    <a href="{{route('show-meal',['slug'=>$meal->slug])}}">{{$meal->name}}</a>
</div>
