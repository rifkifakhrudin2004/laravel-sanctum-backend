<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\UserRole;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:' . implode(',', UserRole::values()),
            'nim' => [
                'nullable',
                'string',
                'max:20',
                Rule::requiredIf(function () {
                    return $this->input('role') === 'mahasiswa';
                }),
                Rule::unique('users', 'nim')->whereNotNull('nim')
            ],
            'nip' => [
                'nullable',
                'string',
                'max:20',
                Rule::requiredIf(function () {
                    return in_array($this->input('role'), ['admin', 'dosen']);
                }),
                Rule::unique('users', 'nip')->whereNotNull('nip')
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nim.required_if' => 'NIM is required for mahasiswa role.',
            'nip.required_if' => 'NIP is required for admin and dosen roles.',
            'nim.unique' => 'This NIM is already taken.',
            'nip.unique' => 'This NIP is already taken.',
        ];
    }
}