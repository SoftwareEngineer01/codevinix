<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\PetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Http\Resources\PetResource;

class PetController extends Controller
{

    public function listPets()
    {
        $pets = Pet::all();
        return response()->json(PetResource::collection($pets));        
    }
   
    public function getPetsByStatus(Request $request) {
        $pets = Pet::where('status', $request->input('status'))->get();
        return response()->json(PetResource::collection($pets));
    }

    public function getPetById(Pet $petId) {
        return response()->json(new PetResource($petId));
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

    public function updatePet(UpdatePetRequest $request) {
        $pet = Pet::find($request->input('id'));
       
        $pet->update($request->validated());

        return response()->json([
            'success' => true,
            'pet' => $pet,
            'message' => 'Pet updated successfully',
        ]);
    }

    public function deletePet(Pet $petId) {                   
        $petId->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pet deleted successfully',
        ]);
    }    

}
