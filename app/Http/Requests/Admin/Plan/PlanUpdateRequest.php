<?php

namespace App\Http\Requests\Admin\Plan;

use Illuminate\Foundation\Http\FormRequest;

class PlanUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:plans,name,'. $this->plan->id , 'string'], // $this->plan->id <=> $this->route('plan')->id
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'status' => ['boolean', 'required']
        ];
    }
}
