<?php

namespace App\Notifications;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class ApplicationResponse extends Notification implements ShouldQueue
{
    use Queueable;
    public Application $application;
    public $message;
    public $revocation_reasons;
    /**
     * Create a new notification instance.
     */
    public function __construct(Application $application, $message, $revocation_reasons = null)
    {
        $this->application = $application;
        $this->message = $message;
        $this->revocation_reasons = $revocation_reasons;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Application Response')
            ->greeting('Application Response')
            ->line($this->message)
            ->line($this->revocation_reasons)
            ->action('Attachments', env('APP_URL').'/attachee/my-reviewed-applications/' .$this->application->id. '/links')
            ->line('Thank you!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'from' => $this->application->advert->department->name,
            'date' => $this->application->date_replied,
            'title' => 'Application Response',
            'application_id' => $this->application->id,
            'revocation_reasons' => $this->revocation_reasons,
            'message' => $this->message,
            'links' => [
                'response_letter' => $this->revocation_reasons == '' ? '/attachee/application-response-letter/' . $this->application->id : '/attachee/application-response-letter/',
                'accept_offer' => $this->application->status == 'accepted' ? '/attachee/offer-acceptance/' . $this->application->id : null,
            ],
        ];
    }


/**
 * Get the broadcastable representation of the notification.
 */
// public function toBroadcast(object $notifiable): BroadcastMessage
// {
//     return new BroadcastMessage([
//         'from' => $this->application->advert->department->name,
//         'date' => $this->application->date_replied,
//         'title' => 'Application Response',
//         'application_id' => $this->application->id,
//         'message' => $this->message,
//         'revocation_reasons' => $this->revocation_reasons,
//         'links' => [
//             'response_letter' => $this->revocation_reasons == null ? env('APP_URL') . '/attachee/application-response-letter/' . $this->application->id : env('APP_URL') . '/attachee/application-response-letter/',
//             'offer_acceptance_form' => $this->application->status == 'accepted' ? env('APP_URL') . '/attachee/offer-acceptance-form/' . $this->application->id : null,
//             'offer_acceptance_form_upload_link' => $this->application->status == 'accepted' ? env('APP_URL') . '/attachee/offer-acceptance-form-upload/' . $this->application->id : null,
//         ],
//     ]);
// }

/**
 * The channels the user receives notification broadcasts on.
 */
// public function receivesBroadcastNotificationsOn(): string
// {
//     return 'users.' . $this->application->applicant->user_id;
// }
}