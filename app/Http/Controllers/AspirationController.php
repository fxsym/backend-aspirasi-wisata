<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAspirationRequest;
use App\Models\Aspiration;
use App\Models\Destination;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AspirationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aspiration = Aspiration::with('destination', 'aspirationCategory')->get();
        return $aspiration;
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
    public function store(StoreAspirationRequest $request)
    {
        $cloudinary = new Cloudinary(env('CLOUDINARY_URL'));
        $validated = $request->validated();
        $idDestination = $validated['destination_id'];
        $destination = Destination::where('id', $idDestination)->firstOrFail();
        $destinationName = Str::slug($destination['name'], '-');

        if ($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $publicId = date('Ymd_His') . '_' . Str::slug($fileName, '-');

            $result = $cloudinary->uploadApi()->upload(
                $request->file('image')->getRealPath(),
                [
                    'public_id' => $publicId,
                    'folder' => 'Aspirations/' . $destinationName,
                ]
            );

            $validated['image'] = $result['secure_url'];
        }

        $aspiration = Aspiration::create([
            'destination_id' => $validated['destination_id'],
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'content' => $validated['content'],
            'image' => $validated['image'] ?? null,
            'aspiration_category_id' => $validated['aspiration_category_id'],
        ]);

        return response()->json([
            'message' => 'Berhasil menambahkan aspirasi',
            'destination' => $aspiration
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
