<?php

namespace App\Jobs;
use App\Models\User;
use App\Notifications\notificationCode;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNotificationCodeJob implements ShouldQueue
{
    use Queueable;


    public $tries = 3 ;

    public  $backoff = [60,600,60*60];

    /**
     * Create a new job instance.
     */
    public function __construct(public $code , public $phoneNumber , public User $existingUser)
    {
        $this->onQueue('Send-Notification-Code');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->existingUser->notify(new notificationCode($this->code,$this->phoneNumber , 'Ghasedak'));

    }
}
