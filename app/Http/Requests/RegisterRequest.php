<?php

namespace App\Http\Requests;

use App\Traits\CustomRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    use CustomRequest;

    protected $message = "Registration failed";
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
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email|max:255',
            'phone' => 'nullable|string|unique:users,phone|max:15',
            'nid' => 'required|string|unique:users,nid|max:20'
        ];
    }
}
