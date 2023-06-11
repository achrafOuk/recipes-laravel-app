<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Category;
use App\Models\Area;


class CategoryController extends Controller
{
    public $areas;
    public $categories;
    public function __construct() {
        $this->areas =  Area::get();
        $this->categories =  Category::get();
    }
    function show($category)
    {
        $category[0] = strtoupper($category[0]);
        $categories = Category::where('category_name','=',$category);
        if(!$categories->exists())
        {
            return redirect('/404');
        }
        $categories = $categories->first();
        $meals = Meal::where('category_id','=',$categories->id)->paginate(9);

        $areas = $this->areas;
        $categories = $this->categories;
        return view('pages.index', compact('meals', 'areas','categories'));

    }
}
