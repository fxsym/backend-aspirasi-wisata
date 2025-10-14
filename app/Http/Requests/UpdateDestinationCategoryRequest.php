<?php

namespace App\Http\Requests;

use App\Models\DestinationCategory;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDestinationCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $destinationCategory = $this->route('destinationCategory');
        return $this->user()->can('update', $destinationCategory);
    }

    protected function failedAuthorization()
    {
        throw new \Illuminate\Auth\Access\AuthorizationException(
            'Maaf, hanya admin yang diperbolehkan mengedit kategori destinasi.'
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama kategori wajib diisi.',
        ];
    }
}
