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
            'ProductBenefits' => 'nullable',
        ]);

        $product = new Product();
        $product->ProductName = $request->ProductName;
        $product->ShortDesrciption = $request->ShortDescription; // Corrected column name here!
        $product->MoreDescription = $request->MoreDescription;
        $product->ProductType = $request->ProductType;
        $product->SkinType = implode(',', $request->SkinType ?? []);
        $product->ConcernType = implode(',', $request->ConcernType ?? []);
        $product->KeyIngredients = $request->KeyIngredients;
        $product->ProductBenefits = $request->ProductBenefits;

        if ($request->hasFile('ProductImage1')) {
            $image1 = $request->file('ProductImage1');
            $image1Name = time() . '_1.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('images'), $image1Name);
            $product->ProductImage1 = 'images/' . $image1Name;
        }

        if ($request->hasFile('ProductImage2')) {
            $image2 = $request->file('ProductImage2');
            $image2Name = time() . '_2.' . $image2->getClientOriginalExtension();
            $image2->move(public_path('images'), $image2Name);
            $product->ProductImage2 = 'images/' . $image2Name;
        }
        if ($request->hasFile('ProductImage3')) {
            $image3 = $request->file('ProductImage3');
            $image3Name = time() . '_3.' . $image3->getClientOriginalExtension();
            $image3->move(public_path('images'), $image3Name);
            $product->ProductImage3 = 'images/' . $image3Name;
        }
        if ($request->hasFile('ProductImage4')) {
            $image4 = $request->file('ProductImage4');
            $image4Name = time() . '_4.' . $image4->getClientOriginalExtension();
            $image4->move(public_path('images'), $image4Name);
            $product->ProductImage4 = 'images/' . $image4Name;
        }
        if ($request->hasFile('ProductImage5')) {
            $image5 = $request->file('ProductImage5');
            $image5Name = time() . '_5.' . $image5->getClientOriginalExtension();
            $image5->move(public_path('images'), $image5Name);
            $product->ProductImage5 = 'images/' . $image5Name;
        }
        if ($request->hasFile('TextureImage')) {
            $texture = $request->file('TextureImage');
            $textureName = time() . '_texture.' . $texture->getClientOriginalExtension();
            $texture->move(public_path('images'), $textureName);
            $product->TextureImage = 'images/' . $textureName;
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
    public function show(Product $product)
    {
        //
    }

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
            'ProductBenefits' => 'nullable',
        ]);

        $product->ProductName = $request->ProductName;
        $product->ShortDesrciption = $request->ShortDescription; // Corrected column name here!
        $product->MoreDescription = $request->MoreDescription;
        $product->ProductType = $request->ProductType;
        $product->SkinType = implode(',', $request->SkinType ?? []);
        $product->ConcernType = implode(',', $request->ConcernType ?? []);
        $product->KeyIngredients = $request->KeyIngredients;
        $product->ProductBenefits = $request->ProductBenefits;

        if ($request->hasFile('ProductImage1')) {
            $image1 = $request->file('ProductImage1');
            $image1Name = time() . '_1.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('images'), $image1Name);
            $product->ProductImage1 = 'images/' . $image1Name;
        }

        if ($request->hasFile('ProductImage2')) {
            $image2 = $request->file('ProductImage2');
            $image2Name = time() . '_2.' . $image2->getClientOriginalExtension();
            $image2->move(public_path('images'), $image2Name);
            $product->ProductImage2 = 'images/' . $image2Name;
        }
        if ($request->hasFile('ProductImage3')) {
            $image3 = $request->file('ProductImage3');
            $image3Name = time() . '_3.' . $image3->getClientOriginalExtension();
            $image3->move(public_path('images'), $image3Name);
            $product->ProductImage3 = 'images/' . $image3Name;
        }
        if ($request->hasFile('ProductImage4')) {
            $image4 = $request->file('ProductImage4');
            $image4Name = time() . '_4.' . $image4->getClientOriginalExtension();
            $image4->move(public_path('images'), $image4Name);
            $product->ProductImage4 = 'images/' . $image4Name;
        }
        if ($request->hasFile('ProductImage5')) {
            $image5 = $request->file('ProductImage5');
            $image5Name = time() . '_5.' . $image5->getClientOriginalExtension();
            $image5->move(public_path('images'), $image5Name);
            $product->ProductImage5 = 'images/' . $image5Name;
        }
        if ($request->hasFile('TextureImage')) {
            $texture = $request->file('TextureImage');
            $textureName = time() . '_texture.' . $texture->getClientOriginalExtension();
            $texture->move(public_path('images'), $textureName);
            $product->TextureImage = 'images/' . $textureName;
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