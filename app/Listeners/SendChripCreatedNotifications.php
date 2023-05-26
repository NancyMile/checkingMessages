<?php

namespace App\Listeners;

use App\Events\ChripCreated;
use App\Models\User;
use App\Notifications\NewChrip;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendChripCreatedNotifications implements ShouldQueue
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
     * @param  \App\Events\ChripCreated  $event
     * @return void
     */
    public function handle(ChripCreated $event)
    {
        //send notification to all users except the author
        foreach(User::whereNot('id',$event->chrip->user_id)->cursor() as $user) {
            $user->notify(new NewChrip($event->chrip));
        }
    }
}
