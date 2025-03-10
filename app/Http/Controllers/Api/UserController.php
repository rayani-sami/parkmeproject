<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

         ]);

         $user = User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),

         ]);

         return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
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

     $token = $user->createToken('auth_token')->plainTextToken;

     return response()->json(['message' => 'Login successful', 'token' => $token], 200);
 }
}
