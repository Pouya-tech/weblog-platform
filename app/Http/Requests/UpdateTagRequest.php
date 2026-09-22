<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateTagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('manage-tags');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => $this->boolean('is_active'),
        ]);
    }

    public function rules(): array
    {
        $tag = $this->route('tag');
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('tags', 'name')->ignore($tag)],
            'slug' => ['required', 'string', 'max:255', Rule::unique('tags', 'slug')->ignore($tag)],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}
