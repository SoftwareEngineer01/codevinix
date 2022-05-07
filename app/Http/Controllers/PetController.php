<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PetRequest;
use App\Models\Pet;
use App\Models\Tag;
use App\Http\Resources\PetResource;

class PetController extends Controller
{

    public function listPets()
    {
        $pets = Pet::all();
        return response()->json(PetResource::collection($pets));        
    }
        
    public function addPet(PetRequest $request) {
        $random = random_int(1, 100);

        $pet = Pet::create([            
            'category' => $request->input('category'), 
            'name' => $request->input('name'), 
            'photoUrls' => 'https://placedog.net/150/150?id='.$random,          
            'tags' => $request->input('tags'),            
            'status' => $request->input('status'),
        ]);

        return response()->json([
            'success' => true,
            'pet' => $pet,
            'message' => 'Pet added successfully',
        ]);
    }

}
