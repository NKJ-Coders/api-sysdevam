<?php

namespace App\Http\Controllers;

use App\Piece_jointes;
use App\Ticket;
use Illuminate\Http\Request;

class PieceJointeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/tickets/{ticket}/link-files",
     *     @OA\Response(response="200", description="Get all files of one ticket")
     * )
     */
    public function show(Ticket $ticket){
        $files = Piece_jointes::where('ticket_id', $ticket->id)->get();
        return $files;
    }

    /**
     * @OA\Post(
     *     path="/api/piece_jointes",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function store(Request $request) {
        if (Piece_jointes::create($request->all())) {
            return response()->json([
                'success' => 'insérée avec succès'
            ], 200);
        }
    }
}
