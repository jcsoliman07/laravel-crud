<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::with('category')
                    ->orderBy('id')
                    ->paginate(10);
        $categories = Category::all();
        return view('product.index', compact('products', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // //Validated Data
        // $attributes = $request->validated();

        // //Create and Store
        // Product::create([
        //     'name' => $attributes['name'],
        //     'category_id' => $attributes['category'],
        //     'price' => $attributes['price'],
        //     'description' => $attributes['description'],
        // ]);

        Product::create($request->validated());

        //Redirect
        return redirect()->route('products.index')->with('success', 'Product Added Succesfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        //
        $attributes = $request->validated();

        $product->update([
            'name'              => $attributes['name'],
            'category_id'       => $attributes['category'],
            'price'             => $attributes['price'],
            'description'       => $attributes['description'],
        ]);

        return redirect()->route('products.index')->with('success', 'Updated Product Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted!');
        
    }
}
