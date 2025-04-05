<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Ingredient;
use App\Models\Question;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $product = Product::count();
        $ingredient = Ingredient::count();
        $question = Question::count();


        if (auth()->user()) {
            return view('admin.dashboard', compact('product', 'ingredient', 'question',));
        } 
    }
}