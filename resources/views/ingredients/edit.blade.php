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
            <a href="{{ route('questions.index') }}" style="font-size: 1em; color:rgb(3, 10, 13);display: flex; align-items: center; margin-right: 20px;">
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
                <input type="text" name="SkinTypeEffect" id="SkinTypeEffect" class="form-control" value="{{ $ingredient->SkinTypeEffect }}">
            </div>
            <div class="form-group">
                <label for="AcneEffect">Acne Effect:</label>
                <input type="text" name="AcneEffect" id="AcneEffect" class="form-control" value="{{ $ingredient->AcneEffect }}">
            </div>
            <div class="form-group">
                <label for="DarkSpotsEffect">Dark Spots Effect:</label>
                <input type="text" name="DarkSpotsEffect" id="DarkSpotsEffect" class="form-control" value="{{ $ingredient->DarkSpotsEffect }}">
            </div>
            <div class="form-group">
                <label for="LargePoresEffect">Large Pores Effect:</label>
                <input type="text" name="LargePoresEffect" id="LargePoresEffect" class="form-control" value="{{ $ingredient->LargePoresEffect }}">
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