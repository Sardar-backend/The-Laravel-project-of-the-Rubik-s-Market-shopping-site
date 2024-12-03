<?php

namespace App\http\ApiRequest\Admin\permission;

use App\RestfulApi\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class permissionRequest extends ApiFormRequest
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
            'name' => 'required|string',
            'display_name' =>'required|string',
        ];
    }
}
