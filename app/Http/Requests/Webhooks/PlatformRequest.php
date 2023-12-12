<?php

namespace App\Http\Requests\Webhooks;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PlatformRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_ref' => ['required', 'string'],
            'scope' => ['required', Rule::in(['price', 'stock', 'status'])]
        ];
    }

    public function messages(): array
    {
        return [
            'product_ref.required' => 'O campo product_ref é obrigatório.',
            'product_ref.string' => 'O campo product_ref deve ser uma string.',
            'scope.required' => 'O campo scope é obrigatório.',
            'scope.in' => 'O valor do campo scope é inválido. Os valores válidos são "price", "stock" e "status"',
        ];
    }
}
