<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public $timestamps = true;

    protected $fillable = ['recipe_id', 'amount', 'unit', 'ingredient_name'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
