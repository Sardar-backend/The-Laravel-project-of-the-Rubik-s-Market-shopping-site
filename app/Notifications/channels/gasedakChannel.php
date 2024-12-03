<?php


namespace App\Notifications\channels;
use App\Notifications\notificationCode;
use DateTimeImmutable;
use Ghasedak\DataTransferObjects\Request\SingleMessageDTO;
use Ghasedak\Exceptions\GhasedakSMSException;
use Ghasedak\GhasedaksmsApi;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Debug\ExceptionHandler;

use function PHPSTORM_META\type;

class gasedakChannel {
    public function send($notifiable, notificationCode $notification)
    {
        // دریافت داده‌های مربوط به OTP از نوتیفیکیشن
        $data = $notification->toghasedaksms($notifiable);

        // ساخت داده‌های ارسال
        $payload = [
            'date' => 0, // برای ارسال فوری
            'receptors' => [
                [
                    'mobile' => $data['mobile'], // شماره موبایل کاربر
                    'clientReferenceId' => $data['client_reference_id'] ?? uniqid(), // شناسه یکتا یا دلخواه
                ],
            ],
            'templateName' => $data['template'], // نام قالب
            'param1' => $data['param1'], // کد OTP
            'isVoice' => false, // پیامک متنی
        ];
        // dd($payload);
        // ارسال درخواست به API قاصدک
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'ApiKey' => env('GHASEDAK_API_KEY'), // کلید API
        ])->post('https://gateway.ghasedak.me/rest/api/v1/WebService/SendOtpWithParams', $payload);

        // بررسی پاسخ و مدیریت خطاها
        if (!$response->successful()) {
            $exceotion =  new \Exception('خطا در ارسال OTP: ' . $response->body());
            app()[ExceptionHandler::class]->report($exceotion);
            throw $exceotion; // برای ا��تفاده در کنس

        }

        return $response->json(); // بازگشت نتیجه (در صورت نیاز)
    }
}









// class gasedakChannel {


//     public function send () {

//         $curl = curl_init();

//         curl_setopt_array($curl, array(
//         CURLOPT_URL => 'https://gateway.ghasedak.me/rest/api/v1/WebService/SendOtpWithParams',
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => '',
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 0,
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => 'POST',
//         CURLOPT_POSTFIELDS =>'{
//         "date": 0,
//         "receptors": [
//             {
//             "mobile": "09309784061",
//             "clientReferenceId": "1"
//             }
//         ],
//         "templateName": "Ghasedak",
//         "Param1": "Code",
//         "isVoice": true,
//         "udh": true
//         }',
//         CURLOPT_HTTPHEADER => array(
//             'Content-Type: application/json',
//             'ApiKey: "2351fd8dcc98550e4a804ac4f9334fe3f57dc452bc4a3fe5c69b68bb2773ed38'
//         ),
//         ));

//         $response = curl_exec($curl);

//         curl_close($curl);
//         echo $response;

//     }
// }
