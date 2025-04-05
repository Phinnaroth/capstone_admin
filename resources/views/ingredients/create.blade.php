@extends('layouts.master')

@section('title', 'Create Ingredient')

@section('breadcrumb')
    @parent
    <li><a href="{{ route('ingredients.index') }}">Ingredients</a></li>
    <li class="active">Create</li>
@endsection

@section('content')
    <div class="container mt-4">
        <h2 style="font-size: 2em; margin: 10px; display: flex; align-items: center;">
            <a href="{{ route('ingredients.index') }}" style="font-size: 1em; color:rgb(3, 10, 13);display: flex; align-items: center; margin-right: 20px;">
                &lt;
            </a>
            Create Ingredient
        </h2>

        <form action="{{ route('ingredients.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="IngredientName">Ingredient Name:</label>
                <input type="text" name="IngredientName" id="IngredientName" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="SkinTypeEffect">Skin Type Effect:</label>
                <select name="SkinTypeEffect" id="SkinTypeEffect" class="form-control">      
                    <option value="None">None</option>
                    <option value="Combination">Combination</option>
                    <option value="Normal">Normal</option>
                    <option value="Sensitive">Sensitive</option>
                    <option value="Oily">Oily</option>
                    <option value="Dry">Dry</option>
                </select>
            </div>
            <div class="form-group">
                <label for="AcneEffect">Acne Effect:</label>
                <select name="AcneEffect" id="AcneEffect" class="form-control">
                    <option value="">Acne Effect</option>
                    <option value="Beneficial">Beneficial</option>
                    <option value="Neutral">Neutral</option>
                    <option value="Harmful">Harmful</option>
                </select>
            </div>
            <div class="form-group">
                <label for="DarkSpotsEffect">Dark Spots Effect:</label>
                <select name="DarkSpotsEffect" id="DarkSpotsEffect" class="form-control">
                    <option value="">Dark Spots Effect</option>
                    <option value="Beneficial">Beneficial</option>
                    <option value="Neutral">Neutral</option>
                    <option value="Harmful">Harmful</option>
                </select>
            </div>
            <div class="form-group">
                <label for="LargePoresEffect">Large Pores Effect:</label>
                <select name="LargePoresEffect" id="LargePoresEffect" class="form-control">
                    <option value="">Large Pores Effect</option>
                    <option value="Beneficial">Beneficial</option>
                    <option value="Neutral">Neutral</option>
                    <option value="Harmful">Harmful</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Description">Description:</label>
                <textarea name="Description" id="Description" class="form-control"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button"class="btn btn-secondary" data-dismiss="modal">Remove</button>
                <button class="btn btn-primary"imary"></i> Add New Ingredient</button>
            </div>
        </form>
    </div>
@endsection