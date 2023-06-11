<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Area;
use App\Models\Category;
use App\Models\Favorite;
use App\Http\Requests\MealRequest;
use Illuminate\Support\Str;

class MealController extends Controller
{
    public $areas;
    public $categories;
    public function __construct() {
        $this->areas =  Area::get();
        $this->categories =  Category::get();
    }
    function index()
    {
        $meals = Meal::orderBy('id', 'desc')->paginate(9);
        $areas = $this->areas;
        $categories = $this->categories;
        return view('pages.index', compact('meals', 'areas','categories'));
    }

    function show($slug)
    {
        $meal = Meal::where('slug','=',$slug);
        if(!$meal->exists())
        {
            return redirect('/404');
        }
        $meal = $meal->first();
        $favorite = false;

        try{
            // get current user id if it exists
            $user_id = auth()->id();
            $favorite = Favorite::where('user_id',$user_id)->where('meal_id',$meal->id)->count() ? true : false;
        }

        catch(Error $e) { }
        $ingrediants = str_replace('\t',' ',$meal->ingrediants);
        $ingrediants = explode('\n',$ingrediants);
        return view('pages.meal',['meal'=>$meal,'is_favorite'=>$favorite,'ingrediants'=>$ingrediants]);
    }
    public function random()
    {
        $slug = Meal::inRandomOrder()->first()->slug;
        return redirect()->route('show-meal',['slug'=>$slug]);
    }

    public function create()
    {
        $areas = $this->areas;
        $categories = $this->categories;
        return view('pages.recipes.add',compact('areas','categories'));
    }

    public function store(MealRequest $request)
    {

        $meal = $request->validated() ;
        $measures = $meal['meassures'] ;
        $ingridiants = $meal['ingredients'] ;

        $ingridiants = array_reduce($measures, function ($ingridians, $item) use ($measures,$ingridiants){
            $index = array_search($item,$measures);
            return $ingridians . $measures[$index].'\t'.$ingridiants[$index].'\n';
        });
        Meal::create([
            'name'=>$meal['name'],
            'slug'=>Str::slug( $meal['name'] ,'-'),
            'image'=>$meal['image'],
            'instructions'=>$meal['instructions'],
            'area_id'=>intval($meal['area']),
            'category_id'=>intval($meal['category']),
            'ingrediants'=>$ingridiants,
        ]);

        return redirect()->route('create-meal')
        ->with('msg','meal was created')
        ->with('type','green');
    }

    public function edit($slug)
    {
        $meal = Meal::where('slug','=',$slug);
        if(!$meal->exists())
        {
            return redirect('/404');
        }
        $meal = $meal->first();

        $meal->ingrediants = explode('\n',$meal->ingrediants);
        $meal->ingrediants = array_map(function($string){  return explode('\t',$string); } , $meal->ingrediants);

        $areas = $this->areas;
        $categories = $this->categories;
        return view('pages.recipes.edit',compact('meal','areas','categories'));
    }

    public function update(MealRequest $request,$slug)
    {
        $meal = Meal::where('slug','=',$slug);

        if(!$meal->exists())
        {
            return redirect('/404');
        }

        $meal_data = $request->validated() ;
        $measures = $meal_data['meassures'] ;
        $ingridiants = $meal_data['ingredients'] ;

        $ingridiants = array_reduce($measures, function ($ingridians, $item) use ($measures,$ingridiants){
            $index = array_search($item,$measures);
            return $ingridians . $measures[$index].'\t'.$ingridiants[$index].'\n';
        });
        $meal->update([
            'name'=>$meal_data['name'],
            'slug'=>Str::slug( $meal_data['name'] ,'-'),
            'image'=>$meal_data['image'],
            'instructions'=>$meal_data['instructions'],
            'area_id'=>intval($meal_data['area']),
            'category_id'=>intval($meal_data['category']),
            'ingrediants'=>$ingridiants,
        ]);

        return redirect()->route('edit-meal',['slug'=>$slug])
        ->with('msg','the recipe was updated successfully')
        ->with('type','green');
    }

    

    public function search(Request $request)
    {
        $searchTerm = $request->input('q');
        $areas = $request->input('areas', []);
        $categories = $request->input('categories', []);
        // dd($categories);
        $meals = new Meal();
        $meals = $meals->where('name','like','%'.$searchTerm.'%');

        for($i=0;$i<count($areas);$i++)
        {
            $searched_area = Area::where('area_name','=',$areas[$i])->first();
            $meals = $i==0 ?$meals->where('area_id','=',$searched_area->id) : $meals->OrWhere('area_id','=',$searched_area->id);
        }

        for($i=0;$i<count($categories);$i++)
        {
            $searched_category = Category::where('category_name','=',$categories[$i])->first();
            $meals = $i==0 ? $meals->where('category_id','=',$searched_category->id) : $meals->OrWhere('category_id','=',$searched_category->id);
        }

        $meals = $meals->paginate(9)->withQueryString();
        $areas = $this->areas;
        $categories = $this->categories;
        return view('pages.index', compact('searchTerm','meals', 'areas','categories'));
    }
    public function delete($slug)
    {
        Meal::where('slug','=',$slug)->delete();
        return back()
        ->with('msg','recipe was removed')
        ->with('type','green');
    }

}
