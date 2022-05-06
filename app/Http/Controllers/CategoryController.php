<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function listCategories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
    
    public function addCategory(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:categories,name']
        );
        
        $category = Category::create($request->all());
        
        return response()->json([
            'success' => true,
            'message' => 'Category created successfully',
            'category' => $category
        ]);
    }

}
