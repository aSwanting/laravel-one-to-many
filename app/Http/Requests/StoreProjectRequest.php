<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\Project;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255|min:3',
            'slug' => Rule::unique('projects', 'slug'),
            'description' => 'max:300'
        ];
    }

    protected function prepareForValidation()
    {
        $slug =  Str::slug($this->title);
        $i = 1;

        while (Project::where('slug', $slug)->exists()) {
            $slug = Str::slug($this->title) . '-' . $i++;
        }

        $this->merge(['slug' => $slug]);
    }
}
