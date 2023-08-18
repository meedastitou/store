<?php

namespace App\Http\Requests\Admin\Roles;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {   
        return $this->user()->can('roles create') ? true : false;
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'permissions' => ['required'],
            'permissions.*' => ['exists:permissions,name'],
            'role'=> ['required','unique:roles,name', 'max:60'],
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
