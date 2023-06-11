<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $table = "categories";
    protected $fillable = ['category_name'];
    use HasFactory;
    public $timestamps = false;
    public function meal()
    {
        return $this->HasMany(Meal::class,'category_id','id');
    }
}
