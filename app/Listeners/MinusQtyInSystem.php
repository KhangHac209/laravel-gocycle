<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MinusQtyInSystem
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

        foreach ($order->orderItems as $item) {
            $product = $item->product;
            $product->qty -= $item->qty;
            $product->save();
        }
    }
}
