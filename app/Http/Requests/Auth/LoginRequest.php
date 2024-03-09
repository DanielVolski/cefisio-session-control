<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function authenticate(): JsonResponse {
        $user = User::where('email', $this->email)->first();

        if (! $user || ! Hash::check($this->password, $user->password)) { 
            return response()->json([
                'message' => 'Invalid credentials',
            ], 404);
        }
        
        $user->tokens()->delete();
        $token = $user->createToken($this->device_name)->plainTextToken;

        return response()->json([
            'token' => $token,
        ]);
    }
}
