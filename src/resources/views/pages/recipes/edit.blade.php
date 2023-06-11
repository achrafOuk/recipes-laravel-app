@extends('layouts/guest')
@section('content')



<x-recipe-form :route="route('update-meal',[ 'slug'=>$meal->slug ]) " :name="$meal->name" :image="$meal->image" :instructions="$meal->instructions" :category_name="$meal->category->category_name" :area_name="$meal->area->area_name" :areas="$areas" :categories="$categories"  :ingrediants="$meal->ingrediants">

</x-recipe-form>

@endsection