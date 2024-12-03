<?php

namespace App\Notifications;
// require __DIR__ . '/vendor/autoload.php';
use App\Notifications\channels\gasedakChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class notificationCode extends Notification implements ShouldQueue
{
    use Queueable;
    public $param;
    public $mobile;
    public $template;
    /**
     * Create a new notification instance.
     */
    public function __construct($param,$mobile , $template)
    {


        $this->param = $param;
        $this->mobile = $mobile;
        $this->template = $template;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */


    public function via(object $notifiable): array
    {

        return [gasedakChannel::class];
    }

    public function toghasedaksms ($notifiable){

        return [
            'mobile' => $this->mobile,
            'template' => $this->template,
            'param1' => $this->param,
            'client_reference_id' => uniqid(), // شناسه یکتا (اختیاری)
        ];
    }

}
