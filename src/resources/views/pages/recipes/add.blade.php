@extends('layouts/guest')
@section('content')

<x-recipe-form :route=" route('store-meal') " :name="old('name')" :image="old('image')" :instructions="old('instructions')" :category_name="old('category_name')" :area_name="old('area_nam')" :areas="$areas" :categories="$categories">

</x-recipe-form>


@endsection