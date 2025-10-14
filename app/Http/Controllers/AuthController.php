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
                'message' => ['Username yang anda masukan tidak ditemukan'],
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

        return $this->respondWithToken($token);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json([
            'message' => 'Logout berhasil'
        ]);
    }

    public function me()
    {
        return response()->json(Auth::user());
    }

    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'message' => 'Login berhasil',
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60, // detik
            'user' => Auth::user()
        ]);
    }
}
