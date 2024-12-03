<?php

namespace App\http\ApiRequest;

use App\RestfulApi\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Gate;
use App\Models\blog;
class BlogRequest extends ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // dd(Auth::user()->name);
        // dd(Gate::allows('Store_Update'));
        return Gate::allows('Store_Update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

            return blog::$rules;

    }
}
