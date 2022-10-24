<?php

namespace App\Listeners;

use App\Events\Accueil as AccueilEvent;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class Acceuil
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(AccueilEvent $event)
    {
        DB::table('visits')->insert([
            'ip' => request()->ip(),
            'country' => request()->getLocale(),
            'created_at' => Carbon::now(),
        ]);
    }
}
