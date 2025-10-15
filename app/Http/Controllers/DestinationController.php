<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;
use App\Http\Resources\DestinationResource;
use App\Models\Destination;
use Cloudinary\Cloudinary;
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
        $destinationName = $validated['name'];
        if ($request->hasFile('main_image_url')) {
            $originalName = $request->file('main_image_url')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $publicId = date('Ymd_His') . '_' . $fileName;

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
        $validated = $request->validated();
        $destination->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Destinasi berhasil diperbarui.',
            'data' => $destination
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();
        return response()->json([
            'message' => 'Destinasi berhasil dihapus',
        ], 200);
    }
}
