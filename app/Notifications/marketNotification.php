<?php

namespace App\Notifications;

use App\Models\Market;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class marketNotification extends Notification
{

    public function __construct(Market $user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        if($this->user->type="عرض"){
            return [
                'id' => $this->user->id,
                'objet' => $this->user->titre,
                'url' => 'boursier/market/forum/promotions/'.$this->user->id
                
            ];
        }elseif($this->user->type="طلب"){
            return [
                'id' => $this->user->id,
                'objet' => $this->user->titre,
                'url' => 'boursier/market/forum/demandes/'.$this->user->id
                
            ];  
        }
    }
}