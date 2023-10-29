<?php

namespace App\Listeners;

use App\Events\SendMailConfirmEvent;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmEmail;

class SendMailConfirmEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendMailConfirmEvent  $event
     * @return void
     */
    public function handle(SendMailConfirmEvent $event)
    {
        $order = $event->order;

        Mail::to($order->email)->send(new ConfirmEmail($order));
    }
}
