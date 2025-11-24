<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'user_input' => 'required',
            'password' => 'required',
        ]);

        $fieldType = Str::contains($request->user_input, '@') ? 'email' : 'username';
        $user = User::where($fieldType, $request->user_input)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'message' => [ucfirst($fieldType) . ' yang anda masukan tidak ditemukan'],
            ]);
        }

        $credentials = ([
            $fieldType => $request->user_input,
            'password' => $request->password
        ]);

        $token = Auth::attempt($credentials);
        if (!$token) {
            throw ValidationException::withMessages([
                'message' => ['Password salah.'],
            ]);
        }

        // ⚠️ SOLUSI: Ubah cookie configuration
        $cookie = cookie(
            'access_token',
            $token,
            60, // menit
            '/',
            '.aspirasi-wisata.vercel.app', // 🔥 domain backend tanpa protocol
            true,   // 🔥 secure harus true jika HTTPS
            true,   // HttpOnly
            false,
            'None'  // 🔥 wajib None untuk cross-domain
        );



        return response()->json([
            'message' => 'Login sukses',
            'token' => $token  // ⚠️ DEBUG: kirim token juga di response
        ])->cookie($cookie);
    }

    public function logout()
    {
        $cookie = cookie()->forget('access_token');
        return response()->json(['message' => 'Logout sukses'])->cookie($cookie);
    }

    public function me()
    {
        return response()->json(Auth::user());
    }

    public function refresh()
    {
        $newToken = Auth::refresh();
        $cookie = cookie(
            'access_token',
            $newToken,
            60,
            '/',
            '.aspirasi-wisata.vercel.app',
            true,
            true,
            false,
            'None'
        );


        return response()->json(['message' => 'Token diperbarui'])->cookie($cookie);
    }
}
