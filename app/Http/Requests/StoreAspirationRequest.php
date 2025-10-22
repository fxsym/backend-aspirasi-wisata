<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAspirationRequest extends FormRequest
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
            'destination_id' => 'required|exists:destinations,id',
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'content' => 'required|string|min:20',
            'image' => 'nullable|mimes:jpeg,png,jpg|max:2048',
            'custom_category' => 'nullable|string|max:100',
            'aspiration_category_id' => 'required|exists:aspiration_categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'destination_id.required' => 'Destinasi wajib diisi.',
            'destination_id.exists' => 'Destinasi yang dipilih tidak valid.',

            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'phone.string' => 'Nomor telepon harus berupa teks.',
            'phone.max' => 'Nomor telepon tidak boleh lebih dari 20 karakter.',

            'content.required' => 'Isi aspirasi wajib diisi.',
            'content.min' => 'Isi aspirasi minimal 20 karakter.',
            'content.string' => 'Isi aspirasi harus berupa teks.',

            'image.mimes' => 'Gambar harus berformat JPEG, PNG, atau JPG.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',

            'custom_category.string' => 'Kategori kustom harus berupa teks.',
            'custom_category.max' => 'Kategori kustom tidak boleh lebih dari 100 karakter.',

            'aspiration_category_id.required' => 'Kategori aspirasi wajib diisi.',
            'aspiration_category_id.exists' => 'Kategori aspirasi yang dipilih tidak valid.',
        ];
    }
}
