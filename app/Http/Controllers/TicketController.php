<?php

namespace App\Http\Controllers;

use App\Repositories\TicketRepositories\GetTicket;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Get(
     *     path="/api/tickets",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function index(GetTicket $tickets)
    {
        return $tickets->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Post(
     *     path="/api/tickets",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function store(Request $request)
    {
        if (Ticket::create($request->all())) {
            return response()->json([
                'success' => 'Ticket crée avec succès'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *     path="/api/tickets/{ticket}",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function show(Ticket $ticket)
    {
        return $ticket;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Put(
     *     path="/api/tickets/{ticket}",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function update(Request $request, Ticket $ticket)
    {
        if ($ticket->update($request->all())) {
            return response()->json([
                'success' => 'Ticket modifié avec succès'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Put(
     *     path="/api/tickets/{ticket}/delete",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function deleteTicketByOnline(Ticket $ticket) {
        if($ticket->update(['online' => -1])) {
            return response()->json([
                'success' => 'Ticket supprimé avec succès'
            ], 200);
        }
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Put(
     *     path="/api/tickets/{ticket}/restore",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function restoreTicketByOnline(Ticket $ticket) {
        if ($ticket->update(['online' => 1])) {
            return response()->json([
                'success' => 'Ticket restauré avec succès'
            ], 200);
        }
    }
}
