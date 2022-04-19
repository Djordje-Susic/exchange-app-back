<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Mail\OrderCreatedReport;
use App\Jobs\FetchQuotesFromExternalAPI;
use App\Jobs\SendEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderCreatedEmail implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        if($event->sendEmail){
            SendEmail::dispatch(
                new OrderCreatedReport($event->order),
                config('mail.order_report_address')
            );
        }
    }
}
