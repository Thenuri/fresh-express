<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use Laravel\Sanctum\Sanctum;

class ApiUserController extends Controller
{
    //

    public function requestToken(Request $request): JsonResponse
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
        $token = $user->createToken($request->device_name);
        return response()->json([
            'token' => $token->plainTextToken,
            'username' => $user->name, // Add the username to the response
        ]);
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
        // return response()->json($request);


        // echo "";
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
        

    
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->role_id = 4;
        $newUser->password = Hash::make($request->password);
        $newUser->phone = $request->phone;
        $newUser->address = $request->address;
        $newUser->dob = $request->dob;
        $newUser->status = 1;
    
        $newUser->save();

        $token = $newUser->createToken($request->device_name);
        return response()->json([
            'token' => $token->plainTextToken,
            'username' => $newUser->name,
             // Add the username to the response
        ]);
    
        // return response()->json(['message' => 'Registration successful', 'user' => $newUser], 200);

       
        
    }

    public function getCustomerDetails(Request $request): JsonResponse
    {
        // Retrieve the customer details based on the API token
        $user = Sanctum::actingAs($request->user(), ['*']);

        if ($user) {
            // Return the customer details as JSON response
            return response()->json([
                'name' => $user->name,
                'contactNumber' => $user->contact_number,
                'address' => $user->address,
                'dateOfBirth' => $user->date_of_birth,
                'emailAddress' => $user->email,
            ]);
        } else {
            // Handle the case when customer details are not found
            return response()->json(['error' => 'Customer details not found'], 404);
        }
    }   

}
