<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Area;
use App\Models\Category;


class DashboardController extends Controller
{
    //
    public $areas;
    public $categories;
    public $columns;
    public function __construct() {
        $this->areas =  Area::get();
        $this->categories =  Category::get();
        $this->columns =['id','image','name','area','category','actions'];
    }
    public function index()
    {
        $meals = Meal::paginate(10)->withQueryString();
        $columns = $this->columns;
        $meals = Meal::orderBy('id', 'desc')->paginate(9);
        $areas = $this->areas;
        $categories = $this->categories;
        return view('dashboard', compact('meals','columns', 'areas','categories') );
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
        $columns = $this->columns;
        return view('dashboard', compact('searchTerm','meals', 'areas','categories','columns') );
    }
}
