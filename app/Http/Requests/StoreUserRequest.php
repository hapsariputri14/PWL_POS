<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string|max:20|unique:users,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|string|min:6',
            'level_id' => 'required|exists:m_level,level_id',
        ];
    }
    
    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username sudah digunakan',
            'nama.required' => 'Nama harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
            'level_id.required' => 'Level ID harus diisi',
            'level_id.exists' => 'Level ID tidak valid',
        ];
    }
}
