<?php

namespace App\Notifications;

use App\Mail\ContactMail;
use App\Models\MessageContact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactRequestNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(private MessageContact $message,public string $email)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail',"database"];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): ContactMail
    {
        return (new ContactMail($this->message,$this->email))
                   // ->line('The introduction to the notification.')
                    //->action('Notification Action', url('/'))
                    //->line('Thank you for using our application!');
                    ;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            "message_id"=>$this->message->id,
            "numero"=>$this->message->numero,
            "email"=>$this->message->email,
            "content"=>$this->message
        ];
    }
}
