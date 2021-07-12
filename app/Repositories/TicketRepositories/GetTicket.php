<?php

namespace App\Repositories\TicketRepositories;

use Illuminate\Support\Facades\DB;

class GetTicket
{
    public function get() {
        $tickets = DB::table('tickets')
                    ->join('clients', 'tickets.client_id', '=', 'clients.id')
                    ->join('users', 'tickets.user_id', '=', 'users.id')
                    ->join('categories', 'tickets.categorie_id', '=', 'categories.id')
                    ->select('*')
                    ->orderBy('tickets.titre')
                    ->get();
        return $tickets;
    }
}
