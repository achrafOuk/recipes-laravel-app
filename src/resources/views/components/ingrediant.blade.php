@props(['measures'])

<div x-data="{ measures: {{ $measures ?? '[]' }},count:1,ingredients: {{ $measures ?? '[]' }}, }">
  <template x-for="i in count" >
    <div class="flex flex-row items-center " x-data="{meassure:`measure ${i}`,ingredient:`ingredient ${i}`,meassure_text: measures[i] ?? '',ingredient_text: ingredients[i] ?? '' }">
        <div class="w-1/2 flex flex-col mr-2" >
            <label for="input1">Meassure:</label>
            <input type="text" 
            class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" 
            name="meassures[]"
            x-bind:value="meassure_text"
            x-bind:placeholder="meassure">
        </div>
        <div class="w-1/2 flex flex-col mr-2">
            <label for="input1">ingredient:</label>
            <input type="text" 
            class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" 
            name="ingredients[]"
            x-bind:value="ingredient_text"
            x-bind:placeholder="ingredient">
        </div>
        <div class="flex flex-row mr-2 mt-10 ">
            <button type="button" x-on:click="count++"  class="flex-shrink-0 px-4 py-2 text-white bg-yellow mr-2 font-bold">
                +
            </button>
            <button type="button" x-show="count>1" x-on:click="count--"  class="flex-shrink-0 px-4 py-2 text-white bg-yellow font-bold">
                -
            </button>

        </div>
    </div>
  </template>
</div>