<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Ingredient;

class RecipeController extends Controller
{
    public function store(Request $request)
    {
         // Adatok validálása
         $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'cooking_time' => 'required|integer',
            'content' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'difficulty_level' => 'required|string|max:255',
            'ingredients' => 'array|required',
            'ingredients.*.amount' => 'required|integer',
            'ingredients.*.unit' => 'required|string|max:255',
            'ingredients.*.ingredient_name' => 'required|string|max:255',
        ]);

        // Recept mentése
        $recipe = new Recipe();
        $recipe->title = $validatedData['title'];
        $recipe->subtitle = $validatedData['subtitle'];
        $recipe->cooking_time = $validatedData['cooking_time'];
        $recipe->content = $validatedData['content'];
        $recipe->type = $validatedData['type'];
        $recipe->difficulty_level = $validatedData['difficulty_level'];
        $recipe->save();

        // Hozzávalók mentése
        foreach ($validatedData['ingredients'] as $ingredientData) {
            $ingredient = new Ingredient();
            $ingredient->recipe_id = $recipe->id; // A recept ID-ja
            $ingredient->amount = $ingredientData['amount'];
            $ingredient->unit = $ingredientData['unit'];
            $ingredient->ingredient_name = $ingredientData['ingredient_name'];
            
            $ingredient->save();
        }

        return response()->json(['message' => 'Recipe added successfully'], 201);
}
}