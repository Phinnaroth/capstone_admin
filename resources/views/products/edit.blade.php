@extends('layouts.master')

@section('title')
    Edit Product
@endsection

@section('breadcrumb')
    @parent
    <li><a href="{{ route('products.index') }}"><i class="fa fa-cubes"></i> Products</a></li>
    <li class="active">Edit Product</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <h2 style="font-size: 2em; margin: 10px; display: flex; align-items: center;">
                <a href="{{ route('products.index') }}" style="font-size: 1em; color:rgb(3, 10, 13);display: flex; align-items: center; margin-right: 20px;">
                    &lt;
                </a>
                Edit Product
            </h2>
            <form role="form" action="{{ route('products.update', $product->ProductID) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="ProductName">Product Name</label>
                        <input type="text" class="form-control" id="ProductName" name="ProductName" value="{{ $product->ProductName }}" required>
                        @error('ProductName')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ShortDescription">Short Description</label>
                        <input type="text" class="form-control" id="ShortDescription" name="ShortDescription" value="{{ $product->ShortDesrciption }}" required>
                        @error('ShortDescription')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ProductImage1">Product Image 1</label>
                        <input type="file" id="ProductImage1" name="ProductImage1" class="form-control">
                        @if ($product->ProductImage1)
                            <img src="{{ asset($product->ProductImage1) }}" alt="Product Image 1" width="100">
                        @endif
                        @error('ProductImage1')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ProductImage2">Product Image 2</label>
                        <input type="file" id="ProductImage2" name="ProductImage2" class="form-control">
                        @if ($product->ProductImage2)
                            <img src="{{ asset($product->ProductImage2) }}" alt="Product Image 2" width="100">
                        @endif
                        @error('ProductImage2')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ProductImage3">Product Image 3</label>
                        <input type="file" id="ProductImage3" name="ProductImage3" class="form-control">
                        @if ($product->ProductImage3)
                            <img src="{{ asset($product->ProductImage3) }}" alt="Product Image 3" width="100">
                        @endif
                        @error('ProductImage3')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ProductImage4">Product Image 4</label>
                        <input type="file" id="ProductImage4" name="ProductImage4" class="form-control">
                        @if ($product->ProductImage4)
                            <img src="{{ asset($product->ProductImage4) }}" alt="Product Image 4" width="100">
                        @endif
                        @error('ProductImage4')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ProductImage5">Product Image 5</label>
                        <input type="file" id="ProductImage5" name="ProductImage5" class="form-control">
                        @if ($product->ProductImage5)
                            <img src="{{ asset($product->ProductImage5) }}" alt="Product Image 5" width="100">
                        @endif
                        @error('ProductImage5')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="TextureImage">Texture Image</label>
                        <input type="file" id="TextureImage" name="TextureImage" class="form-control">
                        @if ($product->TextureImage)
                            <img src="{{ asset($product->TextureImage) }}" alt="Texture Image" width="100">
                        @endif
                        @error('TextureImage')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="MoreDescription">Details Description</label>
                        <textarea class="form-control" id="MoreDescription" name="MoreDescription" rows="3">{{ $product->MoreDescription }}</textarea>
                        @error('MoreDescription')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ProductType">Product types</label>
                        <select name="ProductType" id="ProductType" class="form-control">
                            <option value="Moisturizer" {{ $product->ProductType == 'Moisturizer' ? 'selected' : '' }}>Moisturizer</option>
                            <option value="Foam" {{ $product->ProductType == 'Foam' ? 'selected' : '' }}>Foam</option>
                            <option value="Sunscreen" {{ $product->ProductType == 'Sunscreen' ? 'selected' : '' }}>Sunscreen</option>
                            <option value="Serum" {{ $product->ProductType == 'Serum' ? 'selected' : '' }}>Serum</option>
                            <option value="Toner" {{ $product->ProductType == 'Toner' ? 'selected' : '' }}>Toner</option>
                        </select>
                        @error('ProductType')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="KeyIngredients">Key Ingredients</label>
                        <input type="text" class="form-control" id="KeyIngredients" name="KeyIngredients" value="{{ $product->KeyIngredients }}">
                        @error('KeyIngredients')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ConcernType">Concern Type</label>
                        <select name="ConcernType[]" id="ConcernType" class="form-control" multiple>
                            <option value="Severe Acne" {{ in_array('Severe Acne', explode(',', $product->ConcernType)) ? 'selected' : '' }}>Severe Acne</option>
                            <option value="Mild Acne" {{ in_array('Mild Acne', explode(',', $product->ConcernType)) ? 'selected' : '' }}>Mild Acne</option>
                            <option value="None Acne" {{ in_array('None Acne', explode(',', $product->ConcernType)) ? 'selected' : '' }}>None Acne</option>
                            <option value="Severe Dark Spots" {{ in_array('Severe Dark Spots', explode(',', $product->ConcernType)) ? 'selected' : '' }}>Severe Dark Spots</option>
                            <option value="Mild Dark Spots" {{ in_array('Mild Dark Spots', explode(',', $product->ConcernType)) ? 'selected' : '' }}>Mild Dark Spots</option>
                            <option value="None Dark Spots" {{ in_array('None Dark Spots', explode(',', $product->ConcernType)) ? 'selected' : '' }}>None Dark Spots</option>
                            <option value="Severe Large Pores" {{ in_array('Severe Large Pores', explode(',', $product->ConcernType)) ? 'selected' : '' }}>Severe Large Pores</option>
                            <option value="Mild Large Pores" {{ in_array('Mild Large Pores', explode(',', $product->ConcernType)) ? 'selected' : '' }}>Mild Large Pores</option>
                            <option value="None Large Pores" {{ in_array('None Large Pores', explode(',', $product->ConcernType)) ? 'selected' : '' }}>None Large Pores</option>
                        </select>
                        @error('ConcernType')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="SkinType">Skin Type Categories</label>
                        <select name="SkinType[]" id="SkinType" class="form-control" multiple>
                            <option value="Normal" {{ in_array('Normal', explode(',', $product->SkinType)) ? 'selected' : '' }}>Normal</option>
                            <option value="Sensitive" {{ in_array('Sensitive', explode(',', $product->SkinType)) ? 'selected' : '' }}>Sensitive</option>
                            <option value="Combination" {{ in_array('Combination', explode(',', $product->SkinType)) ? 'selected' : '' }}>Combination</option>
                            <option value="Oily" {{ in_array('Oily', explode(',', $product->SkinType)) ? 'selected' : '' }}>Oily</option>
                            <option value="Dry" {{ in_array('Dry', explode(',', $product->SkinType)) ? 'selected' : '' }}>Dry</option>
                        </select>
                        @error('SkinType')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ProductBenefits">Product Benefits</label>
                        <textarea class="form-control" id="ProductBenefits" name="ProductBenefits" rows="3">{{ $product->ProductBenefits }}</textarea>
                        @error('ProductBenefits')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                    <button class="btn btn-primary"imary"></i> Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
