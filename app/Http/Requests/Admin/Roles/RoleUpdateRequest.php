<?php

namespace App\Http\Requests\Admin\Roles;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('roles edit') ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $role = $this->route('role');
        $role_id = $role->id;
        return [
            //
            'permissions' => ['required'],
            'permissions.*' => ['exists:permissions,name'],
            'role'=> ['required','unique:roles,name,'. $role_id ,'max:60'],
        ];
    }

    public function messages(): array
    {
        return [
            'permissions.required' => __("validation.permissions.required"),
            'role.required' => __("validation.role.required")
        ];
    }
}
