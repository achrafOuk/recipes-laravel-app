@props(['action_route','text'])
<form method="POST" action="{{$action_route}}">
    @csrf
    <button type="submit" class="bg-yellow text-white font-bold py-2 px-4 rounded">
        <i class="icon-heart"></i>
        {{$text}}
    </button>
</form>
