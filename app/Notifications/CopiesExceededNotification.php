<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CopiesExceededNotification extends Notification
{
    use Queueable;

    protected $predictedCopies;
    protected $actualCopies;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($predictedCopies, $actualCopies)
    {
        $this->predictedCopies = $predictedCopies;
        $this->actualCopies = $actualCopies;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'The number of printed copies has exceeded the predicted limit.',
            'predicted_copies' => $this->predictedCopies,
            'actual_copies' => $this->actualCopies,
            'url' => url('/admin-sales')
        ];
    }
}
