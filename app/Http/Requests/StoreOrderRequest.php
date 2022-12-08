<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'order_items' => ['required'],
            'order_items.*.id' => ['required', 'integer', Rule::exists('items', 'id')],
            'order_items.*.quantity' => ['required', 'integer', 'gt:0'],
        ];
    }
}
