<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

class ApiUserController extends Controller
{
    //

    public function requestToken(Request $request): string
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
    
        return $user->createToken($request->device_name)->plainTextToken;
    }

    public function revokeToken(Request $request): string
    {
        $request->user()->currentAccessToken()->delete();
    
        return response()->json(['message' => 'Token revoked']);
    }

    public function revokeAllTokens(Request $request): string
    {
        $request->user()->tokens()->delete();
    
        return response()->json(['message' => 'Tokens revoked']);
    }

    public function register(Request $request): JsonResponse
    {
    $request->validate([
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'ConfirmPassword' => 'required|same:password',
        'phone' => 'required|string|min:10|max:10|regex:/^\d+$/',
        'address' => 'required|string|max:255',
        'dob' => [
            'required',
            'date',
            function ($attribute, $value, $fail) {
                if (!strtotime($value)) {
                    $fail('Invalid date format');
                } else {
                    $dob = Carbon::parse($value);
                    $now = Carbon::now();
                    if ($dob->diffInYears($now) <= 18) {
                        $fail('You must be older than 18 years old to register.');
                    }
                }
            },
        ],
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user) {
        return response()->json(['message' => 'You are already a registered user'], 409);
    }

    $newUser = User::create([
        'email' => $request['email'],
        'role_id'=> 4,
        'password' => Hash::make($request['password']),
        'phone' => $request['phone'],
        'address' => $request['address'],
        'dob' => $request['dob'],
        'status' => 1
    ]);

    return response()->json(['message' => 'Registration successful', 'user' => $newUser], 200);
}


}
