<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the ingredients.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('ingredients.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new ingredient.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredients.create');
    }

    /**
     * Store a newly created ingredient in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'IngredientName' => 'required',
            'SkinTypeEffect' => 'nullable',
            'AcneEffect' => 'nullable',
            'DarkSpotsEffect' => 'nullable',
            'LargePoresEffect' => 'nullable',
            'Description' => 'nullable',
        ]);

        Ingredient::create($request->all());

        return redirect()->route('ingredients.index')
            ->with('success', 'Ingredient created successfully.');
    }

    /**
     * Show the form for editing the specified ingredient.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        return view('ingredients.edit', compact('ingredient'));
    }

    /**
     * Update the specified ingredient in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $request->validate([
            'IngredientName' => 'required',
            'SkinTypeEffect' => 'nullable',
            'AcneEffect' => 'nullable',
            'DarkSpotsEffect' => 'nullable',
            'LargePoresEffect' => 'nullable',
            'Description' => 'nullable',
        ]);

        $ingredient->update($request->all());

        return redirect()->route('ingredients.index')
            ->with('success', 'Ingredient updated successfully.');
    }

    /**
     * Remove the specified ingredient from storage.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect()->route('ingredients.index')
            ->with('success', 'Ingredient deleted successfully.');
    }
}