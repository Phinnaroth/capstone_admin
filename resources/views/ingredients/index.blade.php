@extends('layouts.master')

@section('title', 'Ingredients')

@section('breadcrumb')
    @parent
    <li class="active">Ingredients</li>
    <li>
        <a href="{{ route('ingredients.create') }}" class="btn btn-primary">Add New Ingredient</a>
    </li>
@endsection

@section('content')
    <div class="container mt-4">
        <h2>Ingredient List</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Skin Type Effect</th>
                    <th>Acne Effect</th>
                    <th>Dark Spots Effect</th>
                    <th>Large Pores Effect</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ingredients as $ingredient)
                    <tr>
                        <td>{{ $ingredient->IngredientID }}</td>
                        <td>{{ $ingredient->IngredientName }}</td>
                        <td>{{ $ingredient->SkinTypeEffect }}</td>
                        <td>{{ $ingredient->AcneEffect }}</td>
                        <td>{{ $ingredient->DarkSpotsEffect }}</td>
                        <td>{{ $ingredient->LargePoresEffect }}</td>
                        <td>{{ $ingredient->Description }}</td>
                        <td>
                            <div style="display: flex; flex-direction: row; gap: 5px;">
                                <a href="{{ route('ingredients.edit', $ingredient->IngredientID) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('ingredients.destroy', $ingredient->IngredientID) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection