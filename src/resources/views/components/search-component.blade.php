@props(['action','searchTerm','areas','categories'])
<div class="p-4 hidden md:block">
  <form  action="{{$action}}" method="GET">
    <div class="mb-4">
      <label for="q" class="block mb-2">Search:</label>
      <input type="text" value="{{ empty($searchTerm) ? '':$searchTerm }}" name="q" class="border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:border-blue-500" />
    </div>


    <x-search-select title="Areas">
      @foreach($areas as $area)
        <div>
            <label class="inline-flex items-center">
            @if( !is_null( request()->query('areas') ) && in_array( $area->area_name,request()->query('areas')) )
              <input type="checkbox" value="{{$area->area_name}}" name='areas[]' class="form-checkbox h-5 w-5 text-gray-600" checked/>
            @else
              <input type="checkbox" value="{{$area->area_name}}" name='areas[]' class="form-checkbox h-5 w-5 text-gray-600" />
            @endif
            <span class="ml-2 text-gray-700">{{$area->area_name}}</span>
            </label>
        </div>
      @endforeach
    </x-search-select>

    <x-search-select title="Category">
      @foreach($categories as $category)
        <div>
            <label class="inline-flex items-center">
                @if( !is_null( request()->query('categories') ) && in_array( $category->category_name,request()->query('categories')) )
                  <input type="checkbox" value="{{$category->category_name}}" name='categories[]' class="form-checkbox h-5 w-5 text-gray-600"  checked/>
                @else
                  <input type="checkbox" value="{{$category->category_name}}" name='categories[]' class="form-checkbox h-5 w-5 text-gray-600"   />
                @endif
                <span class="ml-2 text-gray-700">{{$category->category_name}}</span>
            </label>
        </div>
      @endforeach
    </x-search-select>

    <button type="submit" class="mt-4 bg-yellow text-white font-bold py-2 px-4 rounded">
      Search
    </button>
  </form>
</div>
