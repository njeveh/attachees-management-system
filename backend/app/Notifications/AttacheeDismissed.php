<?php

namespace App\Notifications;

use App\Models\Attachee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AttacheeDismissed extends Notification
{
    use Queueable;
    public $attachee;
    public $message;
    public $reason;
    /**
     * Create a new notification instance.
     */
    public function __construct(Attachee $attachee, $message, $reason)
    {
        $this->attachee = $attachee;
        $this->message = $message;
        $this->reason = $reason;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //         ->line('The introduction to the notification.')
    //         ->action('Notification Action', url('/'))
    //         ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'from' => $this->attachee->department->name,
            'date' => date('jS-m-Y'),
            'title' => 'End of Attachment/Internship Notice',
            'attachee_id' => $this->attachee->id,
            'message' => $this->message,
            'links' => [
                'Evaluation Form' => $this->reason == 'completed' ? env('APP_URL') . '/attachee/evaluation-form/' . $this->attachee->id : null,
            ],
        ];
    }

/**
 * Get the broadcastable representation of the notification.
 */
// public function toBroadcast(object $notifiable): BroadcastMessage
// {
//     return new BroadcastMessage([
//         'from' => $this->attachee->department->name,
//         'date' => date('jS-m-Y'),
//         'title' => 'Dismissal Notice',
//         'attachee_id' => $this->attachee->id,
//         'message' => $this->message,
//         'links' => [
//             'Evaluation Form' => $this->reason == 'completed' ? env('APP_URL') . '/attachee/evaluation-form/' . $this->attachee->id : null,
//         ],
//     ]);
// }

/**
 * The channels the user receives notification broadcasts on.
 */
// public function receivesBroadcastNotificationsOn(): string
// {
//     return 'users.' . $this->attachee->applicant->user_id;
// }
}