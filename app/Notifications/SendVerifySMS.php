<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Notifications\Notification;

class SendVerifySMS extends Notification
{
    public function __construct()
    {
        //
    }

    public function via($notifiable): array
    {
        return ['vonage'];
    }

    public function toVonage($notifiable): VonageMessage
    {
        return (new VonageMessage())
            ->content(__('Your verification code is ') . $notifiable->mobile_verify_code)
            ->unicode();
    }

    public function toArray($notifiable): array
    {
        return [
            //
        ];
    }

}
