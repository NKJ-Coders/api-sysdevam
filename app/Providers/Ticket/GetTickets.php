<?php

namespace App\Providers\Ticket;

use App\Ticket;
use Illuminate\Support\ServiceProvider;

class GetTickets extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function getTicket() {
        return Ticket::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
