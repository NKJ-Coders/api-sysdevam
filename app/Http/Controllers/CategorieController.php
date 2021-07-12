<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *     path="/api/categories",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function index()
    {
        return Categorie::orderBy('nom', 'ASC')->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Post(
     *     path="/api/categories",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function store(Request $request)
    {
        if(Categorie::create($request->all())) {
            return response()->json([
                'success' => 'Catégorie créee avec succès'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $category
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Get(
     *     path="/api/categories/{category}",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function show(Categorie $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Put(
     *     path="/api/categories/{category}",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function update(Request $request, Categorie $category)
    {
        if($category->update($request->all())) {
            return response()->json([
                'success' => 'Catégorie modifiée avec succès'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Put(
     *     path="/api/categories/{category}/delete",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function deleteCatByOnline(Categorie $category) {
        if($category->update(['online' => -1])) {
            return response()->json([
                'success' => 'Catégorie supprimée avec succès'
            ], 200);
        }
    }



    /**
     * @OA\Put(
     *     path="/api/categories/{category}/restore",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function restoreCatByOnline(Categorie $category) {
        if ($category->update(['online' => 1])) {
            return response()->json([
                'success' => 'Catégorie restaurée avec succès'
            ], 200);
        }
    }
}
