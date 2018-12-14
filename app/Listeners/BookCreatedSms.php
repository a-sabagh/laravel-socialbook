<?php

namespace App\Listeners;

use App\Events\BookCreated;
use Kavenegar\KavenegarApi;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookCreatedSms implements ShouldQueue
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
     * @param  BookCreated  $event
     * @return void
     */
    public function handle(BookCreated $event)
    {
        $sender = env('KAVENEGAR_SENDER');
        $receptor = $event->user->phone;
        $message = __('email.BookCreatedMsg',['name'=>$event->user->name,'book'=>$event->book->name]);
        $api = new KavenegarApi(env('KAVENEGAR_API_KEY'));
        $api->Send($sender, $receptor, $message);
    }
}
