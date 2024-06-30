<?php

namespace App\Listeners;

use App\Mail\OrderEmailAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailToAdmin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $order = $event->order;
        Mail::to('khangvo20p@gmail.com')->send(new OrderEmailAdmin($order));
    }
}
