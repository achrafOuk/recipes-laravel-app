<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    public $table = "meals";
    // name	slug	image	instructions	area_id	category_id
    protected $fillable = [ 'slug','name', 'image', 'instructions', 'area_id', 'category_id' ,'ingrediants'];
    public $timestamps = false;

    public function area()
    {
        return $this->belongsTo(Area::class,'area_id','id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function favorite()
    {
        return $this->HasMany(Favorite::class,'id','meal_id');
    }
}
