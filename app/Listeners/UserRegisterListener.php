<?php

namespace App\Listeners;

use App\Events\UserRegisterEvent;
use App\Mail\UserRegisterAdminEmail;
use App\Mail\UserRegisterEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserRegisterListener
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
    public function handle(UserRegisterEvent $event): void
    {
        Mail::to($event->data->email)->send(new UserRegisterEmail($event->data));
        Mail::to(webSetting()['admin_email'])->send(new UserRegisterAdminEmail($event->data));
    }
}
