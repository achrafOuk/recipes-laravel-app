@props(['route','name','image','instructions','category_name','area_name','categories','areas',' ingrediants'])

<section class="flex flex-col flex-grow">
  <div class="bg-white w-full md:mx-auto px-6 lg:px-16 flex">
    <div class="w-full h-100">
      <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12 text-center">Create new recipe</h1>
 
        <form method="POST" action="{{$route}}" class="w-full mx-auto">
            @csrf
            @include('components.alert-error')
            @include('components.alert')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                <input type="text" value="{{$name}}" name="name" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" >
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Image:</label>
                <input type="text" value="{{$image}}" name="image"  class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" >
            </div>

            <x-ingrediant-edit :ingrediants="$ingrediants"/>

            <div class="mb-4">
                <label for="message" class="block text-gray-700 font-bold mb-2">instructions:</label>
                <textarea name="instructions"  class="bg-gray-200 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-blue-500 focus:bg-white focus:outline-none" rows="5">
                    {{ $instructions }}
                </textarea>
            </div>

            <div class="mb-4">
                <label for="category" class="block text-gray-700 font-bold mb-2">Category:</label>
                <select name="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                    @foreach($categories as $category) 
                        <option  value="{{$category->id}}">{{$category->category_name}}</option>
                        @if( $category_name == $category->id )
                            <option value="{{$category->id}}" selected>{{$category->category_name}}</option>
                        @else
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-bold mb-2">Area:</label>
                <select name="area" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                    @foreach($areas as $area) 
                            @if( $area_name == $area->id )
                                <option value="{{$area->id}}" selected>{{$area->area_name}}</option>
                            @else
                                <option value="{{$area->id}}">{{$area->area_name}}</option>
                            @endif
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-center">
                <button type="submit" class="w-full block bg-yellow  text-white font-semibold rounded-lg px-4 py-3 mt-6">Add new recipe</button>
            </div>
        </form>

    </div>
  </div>

</section>
