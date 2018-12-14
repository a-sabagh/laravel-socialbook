<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\BookCreated as BookCreatedMailable;
use App\Events\BookCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookCreatedEmail implements ShouldQueue
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
        Mail::to($event->user)->send(new BookCreatedMailable($event->user,$event->book));
    }
}
