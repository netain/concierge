<?php

namespace MrTea\Concierge\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
	public $token;
	public $email;

	public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

	/**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
			->subject('Reset Password Request')
			->greeting('Ciao!')
            ->line("Here is the link to reset your password")
            ->action('Reset Password', url( route('concierge.reset.password') . "?email={$this->email}&token={$this->token}"))
            ->line('\* The link is valid for 30 minutes.');
    }
}