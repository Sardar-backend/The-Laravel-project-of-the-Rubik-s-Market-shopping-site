<?php

namespace App\http\ApiRequest;

use App\RestfulApi\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class ApiContactsRequest extends ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255', // نام ضروری است و باید یک رشته با حداکثر ۲۵۵ کاراکتر باشد
            'number_phone' => 'required|numeric|digits_between:10,15', // شماره تلفن ضروری است، باید عدد باشد و بین ۱۰ تا ۱۵ رقم
            'email' => 'required|email|max:255', // ایمیل ضروری است و باید یک آدرس ایمیل معتبر با حداکثر ۲۵۵ کاراکتر باشد
            'subject' => 'required|string|max:255', // موضوع ضروری است و باید یک رشته با حداکثر ۲۵۵ کاراکتر باشد
            'content' => 'required|string|max:5000', // محتوا ضروری است و باید یک رشته با حداکثر ۵۰۰۰ کاراکتر باشد
        ];
    }
}
