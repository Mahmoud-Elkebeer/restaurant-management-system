<?php

namespace App\Jobs;

use App\Mail\RunOutOfStockAlertMerchantEmail;
use App\Models\Ingredient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Exception;

class RunOutOfStockMerchantAlertJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected Ingredient $ingredient) {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $email = new RunOutOfStockAlertMerchantEmail($this->ingredient);
            Mail::to('merchant@test.com')->send($email);

            $this->ingredient->stock_alert = 1;
            $this->ingredient->save();

        } catch (Exception $exception) {
            Log::error($exception->getMessage());
        }
    }
}
