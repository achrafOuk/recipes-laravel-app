<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Area;
use App\Models\Category;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    //
    public $areas;
    public $categories;

    public function __construct() {
        $this->areas =  Area::get();
        $this->categories =  Category::get();
    }

    public function index()
    {
        $areas=$this->areas;
        $categories=$this->categories;
        $user_id = auth()->id();
        $meals = Favorite::where('user_id','=',$user_id)->with('meal')->paginate(9);
        return view('pages.favorite', compact('meals', 'areas','categories'));
    }

    public function store(Request $request)
    {
        $recipe_id =  intval ( $request->id ) ;
        $recipe = Meal::where('id','=',$recipe_id)->first();
        $user_id = auth()->id();
        Favorite::create([ 'meal_id'=>$recipe_id, 'user_id'=>$user_id ]);

        return redirect()->route('show-meal',['slug'=>$recipe->slug])
        ->with('msg', 'meal was added as favorite')
        ->with('type', 'green');
    }

    public function delete(Request $request)
    {
        $user_id = auth()->id();
        $recipe_id =  intval ( $request->id ) ;
        $recipe = Meal::where('id','=',$recipe_id)->first();
        Favorite::where('user_id',$user_id)->where('meal_id',$recipe_id)->delete();

        return redirect()->route('show-meal',['slug'=>$recipe->slug])
        ->with('msg', 'meal was removed from favorite')
        ->with('type', 'green');
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('q');
        $areas_input = $request->input('areas', []);
        $categories_input = $request->input('categories', []);

        $meals = new Favorite();
        $user_id = auth()->id();
        $meals =  $meals->where('user_id','=',$user_id)->whereHas('meal',function ($query) use ($searchTerm){
            $query->where('name','like','%'.$searchTerm.'%')->orderBy('id','desc');
        });


        $areas = $this->areas;
        $categories = $this->categories;
        if( !$meals->count() ) return view('pages.favorite', compact('searchTerm','meals', 'areas','categories'));

        foreach($areas_input as $area)
        {
            $searched_area = Area::where('area_name','=',$area)->first();
            $meals = $meals->orWhere('area_id','=',$searched_area->id);
        }

        foreach($categories_input as $category)
        {
            $searched_category = Category::where('category_name','=',$category)->first();
            $meals = $meals->orWhere('favorite_id','=',$searched_category->id);
        }

        $meals = $meals->paginate(9)->withQueryString();
        return view('pages.favorite', compact('searchTerm','meals', 'areas','categories'));
    }



}
