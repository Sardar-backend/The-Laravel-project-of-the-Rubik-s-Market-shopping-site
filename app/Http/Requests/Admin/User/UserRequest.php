<?php

namespace App\Http\Requests\Admin\User;

use App\RestfulApi\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends ApiFormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'phonenumber' => ['required' ,'max:255'],
            'meli_code' => ['required', 'max:255'],
            'image' => ['required'],
            'cart_number' => ['required',  'max:255'],
            'home_number' => ['required'  , 'max:255'],
            'email' => ['required',  'email', 'max:255'],
            'birthday' => ['required'],
            'is_superuser' => ['nullable']
        ];
    }
}
