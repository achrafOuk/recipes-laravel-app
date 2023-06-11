<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Area;
use App\Models\Category;

class AreaController extends Controller
{
    public $areas;
    public $categories;
    public function __construct() {
        $this->areas = Area::get();
        $this->categories = Category::get();
    }
    function show($area)
    {

        $area[0] = strtoupper($area[0]);
        $areas = Area::where('area_name','=',$area);
        if(!$areas->exists())
        {
            return redirect('/404');
        }
        $areas = $areas->first();
        // $meals = Meal::paginate(9);
        $meals = Meal::where('area_id','=',$areas->id)->paginate(9);

        $areas = $this->areas;
        $categories = $this->categories;
        return view('pages.index', compact('meals', 'areas','categories'));
    }
}
