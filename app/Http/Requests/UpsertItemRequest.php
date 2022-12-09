<?php

namespace App\Http\Requests;

use App\Enums\ItemStatus;
use App\Models\Subcategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpsertItemRequest extends FormRequest
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

    public function getSubcategory(): Subcategory
    {
        return Subcategory::find($this->subcategory_id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', Rule::unique('items', 'name')->ignore($this->item)],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric', 'min:1'],
            'status' => ['required', new Enum(ItemStatus::class)],
            'subcategory_id' => ['required', Rule::exists('subcategories', 'id')],
        ];
    }
}
