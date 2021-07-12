<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *     path="/api/users",
     *     @OA\Response(response="200", description="Get all users")
     * )
     */
    public function index()
    {
        return User::orderBy('nom', 'ASC')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Post(
     *     path="/api/users",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function store(Request $request)
    {
        if(isset($request->nom) && isset($request->email) && isset($request->password)) {
            if(User::create($request->all())) {
                return response()->json([
                    'success' => 'Utilisateur crée avec succès'
                ], 200);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *     path="/api/users/{user}",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Put(
     *     path="/api/users/{user}",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function update(Request $request, User $user)
    {
        if($user->update($request->all())) {
            return response()->json([
                'success' => 'User modifié avec succès'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Delete(
     *     path="/api/users/{user}",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function destroy(User $user)
    {
        if($user->delete()) {
            return response()->json([
                'success' => 'User supprimé avec succès'
            ], 200);
        }
    }
}
