<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return $users;
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
    public function store(Request $request) {}

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
    public function update(UpdateUserRequest $request, User $user)
    {
        $cloudinary = new Cloudinary(env('CLOUDINARY_URL'));
        $validated = $request->validated();

        if ($request->hasFile('image')) {


            if ($user->image) {
                try {
                    $urlPath = parse_url($user->image, PHP_URL_PATH);
                    $urlPath = urldecode($urlPath);
                    if (preg_match('/\/upload\/(?:v\d+\/)?(.+)\.(jpg|jpeg|png)$/i', $urlPath, $matches)) {
                        $publicId = $matches[1];
                        $cloudinary->uploadApi()->destroy($publicId);
                    }
                } catch (\Exception $e) {
                }
            }

            // 🔼 Upload file baru ke Cloudinary
            $originalName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $publicId = date('Ymd_His') . '_' . Str::slug($fileName, '-');

            $result = $cloudinary->uploadApi()->upload(
                $request->file('image')->getRealPath(),
                [
                    'public_id' => $publicId,
                    'folder' => 'Users/',
                ]
            );

            $validated['image'] = $result['secure_url'];
        }

        // 🧩 Update data user
        $updateData = [
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'image' => $validated['image'] ?? $user->image,
        ];

        // hanya ubah password jika dikirim
        if (!empty($validated['password'])) {
            $updateData['password'] = Hash::make($validated['password']);
        }

        $user->update($updateData);

        return response()->json([
            'status' => 'Success',
            'message' => 'User berhasil diperbarui.',
            'data' => $user
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
