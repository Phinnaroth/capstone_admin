@extends('layouts.master')

@section('title', 'Ingredient List')

@section('breadcrumb')
    @parent
    <li class="active">Ingredients</li>
    <li>
        <a href="{{ route('products.create') }}" class="btn btn-primary ">Add New Product</a>
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" id="search-input" placeholder="Search by Name...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" id="search-button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control" id="skin-type-filter">
                                        <option value="">All Skin Types</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Oily">Oily</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Combination">Combination</option>
                                        <option value="Sensitive">Sensitive</option>
                                        <option value="None">None</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-default" type="button" id="clear-filters">
                                        <i class="fa fa-times"></i> Clear Filters
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Skin Type Effect</th>
                                <th>Acne</th>
                                <th>Dark Spots</th>
                                <th>Large Pores</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="ingredients-table-body">
                            @foreach ($ingredients as $ingredient)
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
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            function filterIngredients() {
                var searchTerm = $('#search-input').val().toLowerCase();
                var skinTypeFilter = $('#skin-type-filter').val();

                $('#ingredients-table-body tr').filter(function() {
                    var name = $(this).find('td:eq(1)').text().toLowerCase();
                    var skinTypeEffect = $(this).find('td:eq(2)').text();

                    var nameMatch = name.includes(searchTerm);
                    var skinTypeMatch = skinTypeFilter === "" || skinTypeEffect.includes(skinTypeFilter);

                    return !(nameMatch && skinTypeMatch && acneEffectMatch); // Hide if all conditions match
                }).toggle();
            }

            $('#search-input').on('keyup', function() {
                filterIngredients();
            });

            $('#search-button').on('click', function() {
                filterIngredients();
            });

            $('#skin-type-filter, #acne-effect-filter').on('change', function() {
                filterIngredients();
            });

            $('#clear-filters').on('click', function() {
                $('#search-input').val('');
                $('#skin-type-filter').val('');
                filterIngredients();
                $('#ingredients-table-body tr').show(); // Show all rows after clearing
            });
        });
    </script>
@endpush