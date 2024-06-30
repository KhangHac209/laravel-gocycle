<?php

namespace App\Listeners;

use App\Mail\OrderEmailCustomer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailToCustomer
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
        Mail::to('khangvo20p@gmail.com')->send(new OrderEmailCustomer($order));
    }
}
