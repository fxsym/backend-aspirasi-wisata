<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;
use App\Http\Resources\DestinationResource;
use App\Models\Destination;
use Cloudinary\Cloudinary;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::with('aspirations', 'destinationCategory', 'destinationGalleryImages')->get();
        return response()->json([
            'message' => 'Data berhasil di dapatkan',
            'destination' => DestinationResource::collection($destinations),
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDestinationRequest $request)
    {
        $cloudinary = new Cloudinary(env('CLOUDINARY_URL'));
        $validated = $request->validated();
        $destinationName = Str::slug($validated['name'], '-');

        if ($request->hasFile('main_image_url')) {
            $originalName = $request->file('main_image_url')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $publicId = date('Ymd_His') . '_' . Str::slug($fileName, '-');

            $result = $cloudinary->uploadApi()->upload(
                $request->file('main_image_url')->getRealPath(),
                [
                    'public_id' => $publicId,
                    'folder' => 'Destinations/' . $destinationName,
                ]
            );

            $validated['main_image_url'] = $result['secure_url'];
        }

        $destination = Destination::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'address' => $validated['address'],
            'maps_link' => $validated['maps_link'],
            'location' => $validated['location'],
            'main_image_url' => $validated['main_image_url'] ?? null,
            'destination_category_id' => $validated['destination_category_id'],
        ]);

        return response()->json([
            'message' => 'Destinasi baru berhasil ditambahkan',
            'destination' => $destination
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDestinationRequest $request, Destination $destination)
    {
        $cloudinary = new Cloudinary(env('CLOUDINARY_URL'));
        $validated = $request->validated();
        $destinationName = Str::slug($validated['name'], '-');

        // Jika ada file baru dikirim
        if ($request->hasFile('main_image_url')) {

            // 🗑️ Hapus foto lama dari Cloudinary
            if ($destination->main_image_url) {
                try {
                    // Ambil path dari URL lama
                    $urlPath = parse_url($destination->main_image_url, PHP_URL_PATH);
                    // Contoh hasil: /djfxfwzin/image/upload/v1760497442/Destinations/Pantai%20Sangat%20Indah/20251015_030359_TestingUpdate.jpg
                    $urlPath = urldecode($urlPath); // ubah %20 jadi spasi

                    // Ambil bagian setelah "/upload/"
                    if (preg_match('/\/upload\/(?:v\d+\/)?(.+)\.(jpg|jpeg|png)$/i', $urlPath, $matches)) {
                        $publicId = $matches[1]; // hasil: Destinations/Pantai Sangat Indah/20251015_030359_TestingUpdate
                        $cloudinary->uploadApi()->destroy($publicId);
                    }
                } catch (\Exception $e) {
                    // Bisa log kalau mau debugging
                    // \Log::error('Gagal hapus gambar lama: ' . $e->getMessage());
                }
            }

            // 🔼 Upload file baru ke Cloudinary
            $originalName = $request->file('main_image_url')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $publicId = date('Ymd_His') . '_' . Str::slug($fileName, '-');

            $result = $cloudinary->uploadApi()->upload(
                $request->file('main_image_url')->getRealPath(),
                [
                    'public_id' => $publicId,
                    'folder' => 'Destinations/' . $destinationName,
                ]
            );

            $validated['main_image_url'] = $result['secure_url'];
        }

        // 🧩 Update data destinasi
        $destination->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'address' => $validated['address'],
            'maps_link' => $validated['maps_link'],
            'location' => $validated['location'],
            'main_image_url' => $validated['main_image_url'] ?? $destination->main_image_url,
            'destination_category_id' => $validated['destination_category_id'],
        ]);

        return response()->json([
            'status' => 'Success',
            'message' => 'Destinasi berhasil diperbarui.',
            'data' => $destination
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        $cloudinary = new Cloudinary(env('CLOUDINARY_URL'));

        if ($destination->main_image_url) {
            try {
                // Ambil path dari URL lama
                $urlPath = parse_url($destination->main_image_url, PHP_URL_PATH);
                // Contoh hasil: /djfxfwzin/image/upload/v1760497442/Destinations/Pantai%20Sangat%20Indah/20251015_030359_TestingUpdate.jpg

                $urlPath = urldecode($urlPath); // ubah %20 jadi spasi

                // Ambil public_id tanpa ekstensi dan tanpa versi (v1760497442)
                if (preg_match('/\/upload\/(?:v\d+\/)?(.+)\.(jpg|jpeg|png)$/i', $urlPath, $matches)) {
                    $publicId = $matches[1]; // hasil: Destinations/Pantai Sangat Indah/20251015_030359_TestingUpdate

                    // Hapus gambar dari Cloudinary
                    $result = $cloudinary->uploadApi()->destroy($publicId);

                    // Optional: log hasil untuk memastikan
                    // \Log::info('Cloudinary delete result:', $result);
                }
            } catch (\Exception $e) {
                // Log error biar tahu kenapa gagal
            }
        }

        // Hapus data destinasi di database
        $destination->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Destinasi dan gambarnya berhasil dihapus.'
        ], 200);
    }
}
