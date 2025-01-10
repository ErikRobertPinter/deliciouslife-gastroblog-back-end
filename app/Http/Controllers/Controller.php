<?php

namespace App\Http\Controllers;


abstract class Controller
{
    function createRecipe(Request $request){
        $recipe = new Recipe();
        $recipe->title = $request->title;
        $recipe->subtitle = $request->subtitle;
        $recipe->cooking_time = $request->cooking_time;
        $recipe->content = $request->content;
        $recipe->type = $request->type;
        $recipe->difficulty_level = $request->difficulty_level;
        $recipe->save();
    }
}