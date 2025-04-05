@extends('layouts.master')

@section('title', 'Edit Ingredient')

@section('breadcrumb')
    @parent
    <li><a href="{{ route('ingredients.index') }}">Ingredients</a></li>
    <li class="active">Edit</li>
@endsection

@section('content')
    <div class="container mt-4">
        <h2 style="font-size: 2em; margin: 10px; display: flex; align-items: center;">
            <a href="{{ route('ingredients.index') }}" style="font-size: 1em; color:rgb(3, 10, 13);display: flex; align-items: center; margin-right: 20px;">
                &lt;
            </a>
            Edit Ingredient
        </h2>

        <form action="{{ route('ingredients.update', $ingredient->IngredientID) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="IngredientName">Ingredient Name:</label>
                <input type="text" name="IngredientName" id="IngredientName" class="form-control" value="{{ $ingredient->IngredientName }}" required>
            </div>
            <div class="form-group">
                <label for="SkinTypeEffect">Skin Type Effect:</label>
                <select name="SkinTypeEffect[]" id="SkinTypeEffect" class="form-control" multiple>
                    @php
                        $selectedSkinTypes = explode(',', $ingredient->SkinTypeEffect);
                    @endphp
                    <option value="Combination" {{ in_array('Combination', $selectedSkinTypes) ? 'selected' : '' }}>Combination</option>
                    <option value="Normal" {{ in_array('Normal', $selectedSkinTypes) ? 'selected' : '' }}>Normal</option>
                    <option value="Sensitive" {{ in_array('Sensitive', $selectedSkinTypes) ? 'selected' : '' }}>Sensitive</option>
                    <option value="Oily" {{ in_array('Oily', $selectedSkinTypes) ? 'selected' : '' }}>Oily</option>
                    <option value="Dry" {{ in_array('Dry', $selectedSkinTypes) ? 'selected' : '' }}>Dry</option>
                    <option value="None" {{ in_array('None', $selectedSkinTypes) ? 'selected' : '' }}>None</option>
                </select>
            </div>
            <div class="form-group">
                <label for="AcneEffect">Acne Effect:</label>
                <select name="AcneEffect" id="AcneEffect" class="form-control">
                    <option value="">-- Select Effect --</option>
                    <option value="Beneficial" {{ $ingredient->AcneEffect == 'Beneficial' ? 'selected' : '' }}>Beneficial</option>
                    <option value="Neutral" {{ $ingredient->AcneEffect == 'Neutral' ? 'selected' : '' }}>Neutral</option>
                    <option value="Harmful" {{ $ingredient->AcneEffect == 'Harmful' ? 'selected' : '' }}>Harmful</option>
                </select>
            </div>
            <div class="form-group">
                <label for="DarkSpotsEffect">Dark Spots Effect:</label>
                <select name="DarkSpotsEffect" id="DarkSpotsEffect" class="form-control">
                    <option value="">-- Select Effect --</option>
                    <option value="Beneficial" {{ $ingredient->DarkSpotsEffect == 'Beneficial' ? 'selected' : '' }}>Beneficial</option>
                    <option value="Neutral" {{ $ingredient->DarkSpotsEffect == 'Neutral' ? 'selected' : '' }}>Neutral</option>
                    <option value="Harmful" {{ $ingredient->DarkSpotsEffect == 'Harmful' ? 'selected' : '' }}>Harmful</option>
                </select>
            </div>
            <div class="form-group">
                <label for="LargePoresEffect">Large Pores Effect:</label>
                <select name="LargePoresEffect" id="LargePoresEffect" class="form-control">
                    <option value="">-- Select Effect --</option>
                    <option value="Beneficial" {{ $ingredient->LargePoresEffect == 'Beneficial' ? 'selected' : '' }}>Beneficial</option>
                    <option value="Neutral" {{ $ingredient->LargePoresEffect == 'Neutral' ? 'selected' : '' }}>Neutral</option>
                    <option value="Harmful" {{ $ingredient->LargePoresEffect == 'Harmful' ? 'selected' : '' }}>Harmful</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Description">Description:</label>
                <textarea name="Description" id="Description" class="form-control">{{ $ingredient->Description }}</textarea>
            </div>
            <div class="modal-footer">
                <button type="button"class="btn btn-secondary" data-dismiss="modal">Remove</button>
                <button class="btn btn-primary"imary"></i> Update Ingredient</button>
            </div>
        </form>
    </div>
@endsection