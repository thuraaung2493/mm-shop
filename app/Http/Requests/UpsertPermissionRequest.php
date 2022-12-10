<?php

namespace App\Http\Requests;

use App\Enums\ItemStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UpsertPermissionRequest extends FormRequest
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
            'name' => ['required', 'string', Rule::unique(Permission::class)->ignore($this->permission)],
        ];
    }
}
