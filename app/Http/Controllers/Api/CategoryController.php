<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Rules\Category as CategoryRule;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwtauth');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), CategoryRule::rules(), CategoryRule::messages());
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()], 400);
        }
        
        $newCategory = Category::create($request->all());

        return response()->json(['success' => true, 'data' => $newCategory], 200);
    }

    public function test($id)
    {
        $test = Category::with('products')->find($id);
        return response()->json(['success' => true, 'data' => $test], 200);
    }
}
