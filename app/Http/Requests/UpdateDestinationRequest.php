<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDestinationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $destination = $this->route('destination');
        return $this->user()->can('update', $destination);
    }

    protected function failedAuthorization()
    {
        throw new \Illuminate\Auth\Access\AuthorizationException(
            'Maaf, hanya admin yang diperbolehkan mengedit destinasi.'
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
            'description' => 'required|string',
            'address' => 'required|string',
            'maps_link' => 'required|url',
            'location' => 'required|string|max:255',
            'main_image_url' => 'nullable|mimes:jpeg,png,jpg|max:2048',
            'destination_category_id' => 'required|exists:destination_categories,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama destinasi wajib diisi.',
            'name.string' => 'Nama destinasi harus berupa teks.',
            'name.max' => 'Nama destinasi maksimal 255 karakter.',

            'description.required' => 'Deskripsi destinasi wajib diisi.',
            'description.string' => 'Deskripsi destinasi harus berupa teks.',

            'address.required' => 'Alamat destinasi wajib diisi.',
            'address.string' => 'Alamat destinasi harus berupa teks.',

            'maps_link.required' => 'Link peta wajib diisi.',
            'maps_link.url' => 'Link peta harus berupa URL yang valid.',

            'location.required' => 'Lokasi wajib diisi.',
            'location.string' => 'Lokasi harus berupa teks.',
            'location.max' => 'Lokasi maksimal 255 karakter.',

            'main_image_url.url' => 'URL gambar utama harus berupa URL yang valid.',

            'destination_category_id.required' => 'Kategori destinasi wajib dipilih.',
            'destination_category_id.exists' => 'Kategori destinasi tidak valid.',
        ];
    }
}
