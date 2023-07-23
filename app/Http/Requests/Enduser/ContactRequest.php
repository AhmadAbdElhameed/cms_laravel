<?php

namespace App\Http\Requests\Enduser;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'name' => 'required|string|min:2|max:255',
            'mobile' => 'required|min:10|numeric',
            'title' => 'required|string|min:2|max:255',
            'email' => 'required|string|email',
            'message' => 'required|string|min:10|max:255',
        ];
    }
}
