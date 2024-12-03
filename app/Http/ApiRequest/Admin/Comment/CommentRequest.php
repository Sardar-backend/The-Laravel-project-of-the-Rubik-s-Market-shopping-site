<?php

namespace App\http\ApiRequest\Admin\Comment;

use App\RestfulApi\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends ApiFormRequest
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
            'content' => 'required',
            'user_id' => 'required|exists:users,id',
            'commenttable_type' => 'required|string',
            'commenttable_id' => 'required|exists:'.app($this->commenttable_type)->getTable().',id',
            'parent_id' => 'nullable'
        ];
    }
}
