<?php

namespace App\Notifications;

use App\Models\Actualite;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewActualiteNotification extends Notification
{

    public function __construct(Actualite $user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'id' => $this->user->id,
            'objet' => $this->user->titre,
            'url' => 'boursier/dashboard'
            
        ];
    }
}