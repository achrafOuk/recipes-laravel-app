<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public $table = "favorites";
    protected $fillable = ['meal_id','user_id'];
    use HasFactory;
    public $timestamps = false;
    public function meal()
    {
        return $this->BelongsTo(Meal::class,'meal_id','id');
    }
    public function user()
    {
        return $this->BelongsTo(User::class,'user_id','id');
    }
}
