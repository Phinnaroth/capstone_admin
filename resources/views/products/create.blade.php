@extends('layouts.master')

@section('title')
    Products
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Add New Product</li>
@endsection

@section('content')
<div class="container mt-4">
    <div class="d-flex align-items-center mb-4">
        <h2 style="font-size: 2em; margin: 10px; display: flex; align-items: center;">
            <a href="{{ route('products.index') }}" style="font-size: 1em; color:rgb(3, 10, 13);display: flex; align-items: center; margin-right: 20px;">
                &lt;
            </a>
            Add New Product
        </h2>
    </div>
    <hr style="border: 1px solid #ccc; margin-bottom: 20px;">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="ProductName" id="ProductName" class="form-control" placeholder="Product Name" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="ShortDescription" id="ShortDescription" class="form-control" placeholder="Short description" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ProductImage1">Product Image 1</label>
                    <div class="custom-file">
                        <input type="file" name="ProductImage1" id="ProductImage1" class="custom-file-input" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ProductImage1">Product Image 2</label>
                    <div class="custom-file">
                        <input type="file" name="ProductImage2"id="ProductImage2" class="custom-file-input">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="ProductImage4">Product Image 3</label>
                    <div class="custom-file">
                        <input type="file" name="ProductImage3" id="ProductImage3" class="custom-file-input">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ProductImage4">Product Image 4</label>
                    <div class="custom-file">
                        <input type="file" name="ProductImage4" id="ProductImage4" class="custom-file-input">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ProductImage4">Product Image 5</label>
                    <div class="custom-file">
                        <input type="file" name="ProductImage5" id="ProductImage5" class="custom-file-input">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="TextureImage">Texture Image</label>
                    <div class="custom-file">
                        <input type="file" name="TextureImage" id="TextureImage" class="custom-file-input">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <textarea name="MoreDescription" id="MoreDescription" class="form-control" rows="3" placeholder="Details description"></textarea>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ProductType">Product types</label>
                    <select name="ProductType" id="ProductType" class="form-control">
                        <option value="Moisturizer">Moisturizer</option>
                        <option value="Foam">Foam</option>
                        <option value="Sunscreen">Sunscreen</option>
                        <option value="Serum">Serum</option>
                        <option value="Toner">Toner</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="KeyIngredients">Key Ingredients</label>
                    <input type="text" name="KeyIngredients" id="KeyIngredients" class="form-control" placeholder="Key Ingredients">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ConcernType">Concern Type</label>
                    <select name="ConcernType[]" id="ConcernType" class="form-control" multiple>
                        <option value="Severe Acne">Severe Acne</option>
                        <option value="Mild Acne">Mild Acne</option>
                        <option value="None Acne">None Acne</option>
                        <option value="Severe Dark Spots">Severe Dark Spots</option>
                        <option value="Mild Dark Spots">Mild Dark Spots</option>
                        <option value="None Dark Spots">None Dark Spots</option>
                        <option value="Severe Large Pores">Severe Large Pores</option>
                        <option value="Mild Large Pores">Mild Large Pores</option>
                        <option value="None Large Pores">None Large Pores</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="SkinType">Skin Type Categories</label>
                    <select name="SkinType[]" id="SkinType" class="form-control" multiple>
                        <option value="Normal">Normal</option>
                        <option value="Sensitive">Sensitive</option>
                        <option value="Combination">Combination</option>
                        <option value="Oily">Oily</option>
                        <option value="Dry">Dry</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="ProductDetails">Product Details</label>
            <textarea name="ProductDetails" id="ProductDetails" class="form-control" rows="3" placeholder="Product Details"></textarea>
        </div>
        <div class="form-group">
            <label for="ProductBenefits">Product Benefits</label>
            <textarea name="ProductBenefits" id="ProductBenefits" class="form-control" rows="3" placeholder="Product Benefits"></textarea>
        </div>

        <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Remove</button>
            <button class="btn btn-primary"imary"></i> Add New Product</button>
        </div>
    </form>
</div>
@endsection
