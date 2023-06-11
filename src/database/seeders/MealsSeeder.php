<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Meal;
use App\Models\Area;
use App\Models\Category;
use Illuminate\Support\Str;

class MealsSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i < 100; $i++) {
            echo $i,'  meals of 200 <br/>';
            $response = Http::get('www.themealdb.com/api/json/v1/1/random.php');
            $data = $response->json();
            $meal_data = $data['meals'][0];
            $meal_name = $meal_data['strMeal'];

            if (!Meal::where('name', $meal_name)->exists()) {
                $meal_type = $meal_data['strArea'];
                $area = Area::firstOrCreate(['area_name' => $meal_type]);

                $meal_category = $meal_data['strCategory'];
                $category = Category::firstOrCreate(['category_name' => $meal_category]);
                $ingredians='';
                for($j=1;$j<21;$j++)
                {
                    $ingredian = $meal_data['strMeasure'.$j].'\t'.$meal_data['strIngredient'.$j];
                    if( $meal_data['strMeasure'.$j] !=" " )
                    {
                        $ingredians .= $j!=20 ? $ingredian.'\n' : $ingredian ;
                    }
                }
                $meal = Meal::create([
                    'name' => $meal_data['strMeal'],
                    'slug' => Str::slug($meal_data['strMeal'], '-'),
                    'image' => $meal_data['strMealThumb'],
                    'instructions' => $meal_data['strInstructions'],
                    'area_id' => $area->id,
                    'category_id' => $category->id,
                    'ingrediants' =>$ingredians
                ]);
            }
        }
    }

}


