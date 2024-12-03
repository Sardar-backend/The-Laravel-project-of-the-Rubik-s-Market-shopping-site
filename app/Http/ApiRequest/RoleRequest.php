<?php

namespace App\http\ApiRequest;

use App\RestfulApi\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends ApiFormRequest
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

            'name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/', // اجباری، رشته، حداکثر 255 کاراکتر و فقط شامل حروف و فاصله
            'display_name' => 'required|string|max:255|min:3', // اجباری، رشته، حداقل 3 کاراکتر و حداکثر 255
            'permissions' => 'required|array|min:1', // اجباری، آرایه، حداقل یک مقدار
            'permissions.*' => 'integer|exists:permissions,id', // هر مقدار آرایه باید عدد صحیح و معتبر در جدول permissions باشد
        ];

    }
}
