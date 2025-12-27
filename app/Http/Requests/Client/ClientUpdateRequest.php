<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientUpdateRequest extends FormRequest
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
            'phone' => ['required', 'string', Rule::unique('clients', 'phone')->ignore($this->client->id), 'max:255'],
            'email' => ['nullable', 'string', 'email', Rule::unique('clients', 'email')->ignore($this->client->id), 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Название сделки обязательно для заполнения',
            'name.string' => 'Название должно быть не числом',
            'name.max' => 'Не более 255 знаков',

            'phone.required' => "Обязательно для заполнения",
            'phone.string' => "Должно быть строкой",
            'phone.unique' => "Такой телефон уже есть",
            'phone.max' => "Не более 255 знаков",

            'email.string' => "Должно быть строкой",
            'email.email' => "Должно быть типа email@",
            'email.unique' => "Такой email уже есть",
            'email.max' => "Не более 255 знаков",

            'company.string' => "Должно быть строкой",
            'company.max' => "Не более 255 знаков",

        ];
    }
}
