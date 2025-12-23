<?php

namespace App\Http\Requests\Deal;

use Illuminate\Foundation\Http\FormRequest;

class DealUpdateRequest extends FormRequest
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
        ];
    }
}
