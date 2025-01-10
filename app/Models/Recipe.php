<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public $timestamps = true;

    protected $fillable = ['title', 'subtitle', 'cooking_time', 'content', 'type', 'difficulty_level'];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
