<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index()
    {
        $products = products::select('id','name', 'image', 'price', 'category')->get(); // Fetch specific columns
        return response()->json($products);
    }
    public function getProductCategories()
    {
        $categories = products::distinct('category')->pluck('category')->all();
        return response()->json(['categories' => $categories]);
    }
    public function getProductsByCategoryName($categoryName)
    {
        $products = products::where('category', $categoryName)
            ->select('id', 'name', 'price', 'image', 'category')
            ->get()
            ->map(function ($product) {
                $product->price = (double) $product->price;
                return $product;
            });

        return response()->json(['products' => $products]);
    }


    // http://127.0.0.1:8000/api/products/categories/Fruit/

    
}
