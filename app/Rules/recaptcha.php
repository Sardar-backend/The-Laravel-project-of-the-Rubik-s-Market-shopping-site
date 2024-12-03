<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        try {
            
            $client = new Client();
            $response = $client->request('POST' , 'https://www.google.com/recaptcha/api/siteverify' ,
                [
                        'form_params' => [
                        'secret' => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
                        'response' => $value,
                        'remoteip' => request()->ip(),

                    ]

                ]);

                $response = json_decode($response->getBody());

                                    // dd($response);
        }catch (\Exception $e){

            $fail('You have been detected as a robot ');
        }
    }
}
