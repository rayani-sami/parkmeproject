<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
     // Enregistrement d'un utilisateur
     public function register(Request $request)
     {
         $request->validate([
             'name' => 'required|string',
             'email' => 'required|email|unique:users',
             'password' => 'required|string|min:8',
             'status' => 'nullable|integer|in:0,1', // Optionnel, par défaut actif
         ]);

         $user = User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),
             'status' => $request->status ?? 1, // par défaut "actif"
         ]);

         return response()->json([
             'message' => 'User registered successfully',
             'user' => $user,
         ], 201);
     }


     // Authentification d'un utilisateur


     public function login(Request $request)
     {
         $request->validate([
             'email' => 'required|email',
             'password' => 'required|string',
         ]);

         $user = User::where('email', $request->email)->first();

         if (!$user || !Hash::check($request->password, $user->password)) {
             return response()->json(['message' => 'Invalid credentials'], 401);
         }

         // Vérification du statut
         if ($user->status != 1) {
             return response()->json(['message' => 'User account is inactive'], 403);
         }

         $token = $user->createToken('auth_token')->plainTextToken;

         return response()->json([
             'message' => 'Login successful',
             'token' => $token,
         ], 200);
     }



public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'sometimes|string|max:255',
        'email' => 'sometimes|email|unique:users,email,' . $user->id,
        'password' => 'sometimes|string|min:8|confirmed',
    ]);

    if ($request->has('name')) {
        $user->name = $request->name;
    }

    if ($request->has('email')) {
        $user->email = $request->email;
    }

    if ($request->has('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return response()->json([
        'message' => 'Profile updated successfully',
        'user' => $user
    ]);
}
}
