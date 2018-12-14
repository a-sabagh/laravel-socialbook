<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Kavenegar\KavenegarApi;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserWelcomeSms implements ShouldQueue
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
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $sender = env('KAVENEGAR_SENDER');
        $receptor = $event->user->phone;
        $message = __('email.welcome',['name'=>$event->user->name]);
        $api = new KavenegarApi(env('KAVENEGAR_API_KEY'));
        $api->Send($sender, $receptor, $message);
    }
}
