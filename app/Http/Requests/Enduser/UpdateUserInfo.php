<?php

namespace App\Http\Requests\Enduser;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserInfo extends FormRequest
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
                    'name' => 'required|string|max:255|min:3',
                    'email' => 'required|email|regex:/(.+)@(.+)\.(.+)/i|unique:users,email',
                    'mobile' => 'required|min:10|unique:users,mobile',
                    'image' => 'nullable|image|mimes:jpg,jpeg,webp,png|max:4000',
                    'bio' => 'nullable|string|max:500|min:5',
                    'receive_email' => 'required',
        ];
    }
}
