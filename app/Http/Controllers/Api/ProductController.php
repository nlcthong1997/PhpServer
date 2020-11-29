<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Api\Controller;
use App\Http\Rules\Product as ProductRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwtauth');
    }


    public function all()
    {
        $products = Product::all();
        if ($products->count() == 0) {
            return response()->json($products, 204);
        }
        return response()->json($products, 200);
    }


    public function show($id)
    {
        $product = Product::find($id);
        if (empty($product)) {
            return response()->json($product, 204);
        }
        return response()->json($product, 200);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ProductRule::rules(), ProductRule::messages());
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()], 400);
        }
        
        $newProduct = Product::create($request->all());

        return response()->json(['success' => true, 'data' => $newProduct], 200);
    }


    public function update()
    {

    }


    public function delete()
    {

    }


    public function test($id)
    {
        $test = Product::with('category')->find($id);
        return response()->json(['success' => true, 'data' => $test], 200);
    }
}
