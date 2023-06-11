<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public $table = "areas";
    protected $fillable = ['area_name'];
    use HasFactory;
    public $timestamps = false;
    public function meal()
    {
        return $this->HasMany(Meal::class,'area_id','id');
    }
}
