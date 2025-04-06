<?php

// ProductController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'ProductName' => 'required',
        'ShortDescription' => 'required',
        'ProductImage1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'ProductImage2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'ProductImage3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'ProductImage4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'ProductImage5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'TextureImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'MoreDescription' => 'nullable',
        'ProductType' => 'nullable',
        'SkinType' => 'nullable|array',
        'ConcernType' => 'nullable',
        'KeyIngredients' => 'nullable',
        'ProductDetails' => 'nullable',
        'ProductBenefits' => 'nullable',
    ]);

    $product = new Product();
    $product->ProductName = $request->ProductName;
    $product->ShortDesrciption = $request->ShortDescription; // Note: Typo here, should be ShortDescription
    $product->MoreDescription = $request->MoreDescription;
    $product->ProductType = $request->ProductType;
    $product->SkinType = implode(',', $request->SkinType ?? []);
    $product->ConcernType = implode(',', $request->ConcernType ?? []);
    $product->KeyIngredients = $request->KeyIngredients;
    $product->ProductDetails = $request->ProductDetails;
    $product->ProductBenefits = $request->ProductBenefits;

    // Store image binary data instead of file paths
    if ($request->hasFile('ProductImage1')) {
        $image1 = $request->file('ProductImage1');
        $product->ProductImage1 = file_get_contents($image1->getRealPath());
    }

    if ($request->hasFile('ProductImage2')) {
        $image2 = $request->file('ProductImage2');
        $product->ProductImage2 = file_get_contents($image2->getRealPath());
    }

    if ($request->hasFile('ProductImage3')) {
        $image3 = $request->file('ProductImage3');
        $product->ProductImage3 = file_get_contents($image3->getRealPath());
    }

    if ($request->hasFile('ProductImage4')) {
        $image4 = $request->file('ProductImage4');
        $product->ProductImage4 = file_get_contents($image4->getRealPath());
    }

    if ($request->hasFile('ProductImage5')) {
        $image5 = $request->file('ProductImage5');
        $product->ProductImage5 = file_get_contents($image5->getRealPath());
    }

    if ($request->hasFile('TextureImage')) {
        $texture = $request->file('TextureImage');
        $product->TextureImage = file_get_contents($texture->getRealPath());
    }

    $product->save();

    return redirect()->route('products.index')->with('success', 'Product added successfully.');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
{
    $request->validate([
        'ProductName' => 'required',
        'ShortDescription' => 'required',
        'ProductImage1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'ProductImage2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'ProductImage3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'ProductImage4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'ProductImage5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'TextureImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'MoreDescription' => 'nullable',
        'ProductType' => 'nullable',
        'SkinType' => 'nullable|array',
        'ConcernType' => 'nullable',
        'KeyIngredients' => 'nullable',
        'ProductDetails' => 'nullable',
        'ProductBenefits' => 'nullable',
    ]);

    $product->ProductName = $request->ProductName;
    $product->ShortDesrciption = $request->ShortDescription; // Note: Typo here, should be ShortDescription
    $product->MoreDescription = $request->MoreDescription;
    $product->ProductType = $request->ProductType;
    $product->SkinType = implode(',', $request->SkinType ?? []);
    $product->ConcernType = implode(',', $request->ConcernType ?? []);
    $product->KeyIngredients = $request->KeyIngredients;
    $product->ProductDetails = $request->ProductDetails;
    $product->ProductBenefits = $request->ProductBenefits;

    // Store image binary data instead of file paths
    if ($request->hasFile('ProductImage1')) {
        $image1 = $request->file('ProductImage1');
        $product->ProductImage1 = file_get_contents($image1->getRealPath());
    }

    if ($request->hasFile('ProductImage2')) {
        $image2 = $request->file('ProductImage2');
        $product->ProductImage2 = file_get_contents($image2->getRealPath());
    }

    if ($request->hasFile('ProductImage3')) {
        $image3 = $request->file('ProductImage3');
        $product->ProductImage3 = file_get_contents($image3->getRealPath());
    }

    if ($request->hasFile('ProductImage4')) {
        $image4 = $request->file('ProductImage4');
        $product->ProductImage4 = file_get_contents($image4->getRealPath());
    }

    if ($request->hasFile('ProductImage5')) {
        $image5 = $request->file('ProductImage5');
        $product->ProductImage5 = file_get_contents($image5->getRealPath());
    }

    if ($request->hasFile('TextureImage')) {
        $texture = $request->file('TextureImage');
        $product->TextureImage = file_get_contents($texture->getRealPath());
    }

    $product->save();

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
