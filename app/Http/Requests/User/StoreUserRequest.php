<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', Rule::unique('users', 'email'), 'max:255'],
            'role' => ['required', 'string', Rule::in(['admin', 'manager', 'seller'])],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Имя обязательно для заполнения',
            'name.string' => 'Название должно быть не числом',
            'name.max' => 'Не более 255 знаков',

            'email.required' => "Поле обязательно для заполнения",
            'email.string' => "Должно быть строкой",
            'email.email' => "Должно быть типа email@",
            'email.unique' => "Такой email уже зарегистрирован",
            'email.max' => "Не более 255 знаков",

            'role.required' => 'Поле роль обязательно для заполнения',
            'role.string' => 'Название должно быть не числом',
            'role.in' => 'Такой роли не существует'

        ];
    }
}
