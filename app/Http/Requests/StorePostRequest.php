<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Override;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('manage-posts');
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
            'is_featured' => $this->boolean('is_featured'),
        ]);
    }
  
    // public function failedValidation(Validator $validator): void
    // {
    //     dd(
    //         $this->file('image'),
    //         $this->file('image')?->getError(),
    //         $validator->errors()->toArray()
    //     );
    // }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', Rule::unique('posts', 'title')],
            'category_id' => ['required', 'exists:categories,id'],
            'slug'        => ['nullable', 'string', 'max:255', 'unique:posts,slug'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'body' => ['required', 'string'],

            'is_active' => ['required', 'boolean',],
            'is_featured' => ['required', 'boolean',],
        ];
    }
}
