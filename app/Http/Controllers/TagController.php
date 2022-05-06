<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{

    public function listTags()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }

    public function addTag(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags,name']
        );

        $tag = Tag::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Tag created successfully',
            'tag' => $tag
        ]); 
    }
    
}
