<?php

namespace App\Mail;

use App\Models\Ingredient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RunOutOfStockAlertMerchantEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(protected Ingredient $ingredient) {}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.run_out_of_stock_merchant_alert', ['ingredient' => $this->ingredient]);
    }
}
