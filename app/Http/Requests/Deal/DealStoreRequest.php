<?php

namespace App\Http\Requests\Deal;

use Illuminate\Foundation\Http\FormRequest;

class DealStoreRequest extends FormRequest
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
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'status_id' => ['required', 'integer', 'exists:deal_statuses,id'],
            'comments' => ['nullable', 'string'],
            'phone_client' => ['required', 'string', 'max:255'],
            'name_client' => ['required', 'string', 'max:255'],
            'email_client' => ['nullable', 'string', 'email', 'max:255'],
            'company_client_name' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Название сделки обязательно для заполнения',
            'name.string' => 'Название сделки должно быть не числом',
            'name.max' => 'Не более 255 знаков',

            'user_id.required' => "Обязательно для заполнения",
            'user_id.integer' => "Должно быть число",
            'user_id.exists' => "Такого ответственного не сущесвует",

            'status_id.required' => "Обязательно для заполнения",
            'status_id.integer' => "Должно быть число",
            'status_id.exists' => "Такого статуса не сущесвует",

            'comments.string' => "Должно быть строкой",

            'phone_client.required' => "Обязательно для заполнения",
            'phone_client.string' => "Должно быть строкой",
            'phone_client.max' => "Не более 255 знаков",

            'name_client.required' => "Обязательно для заполнения",
            'name_client.string' => "Должно быть строкой",
            'name_client.max' => "Не более 255 знаков",

            'email_client.string' => "Должно быть строкой",
            'email_client.email' => "Должно быть типа email@",
            'email_client.max' => "Не более 255 знаков",

            'company_client_name.string' => "Должно быть строкой",
            'company_client_name.max' => "Не более 255 знаков",

        ];
    }
}
