<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpsertSubcategoryRequest extends FormRequest
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

    public function getCategory(): Category
    {
        return Category::find($this->category_id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique(Subcategory::class)->ignore($this->subcategory)],
            'category_id' => ['required', Rule::exists('categories', 'id'),],
        ];
    }
}
