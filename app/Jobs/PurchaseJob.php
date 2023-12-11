<?php

namespace App\Jobs;

use App\Mail\ArtisanPurchaseMail;
use App\Mail\UserPurchaseMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class PurchaseJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $order = $this->order;
        Mail::to($order->artisan->email)->send(new ArtisanPurchaseMail($order));
        Mail::to($order->buyer->email)->send(new UserPurchaseMail($order));
    }
}
