<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function login(Request $request)
  {
    $request->validate([
      'username' => 'required|string',
      'password' => 'required|string',
    ]);

    $credentials = $request->only('username', 'password');

    if (!Auth::attempt($credentials)) {
      return response()->json([
        'status' => 'error',
        'message' => 'Unauthorized',
      ], 401);
    }

    $user = User::where('username', $request->username)->first();

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
      'status' => 'success',
      'message' => 'Login successful',
      'data' => [
        'token' =>  $token,
        'admin' => [
          'id' => $user->id,
          'name' => $user->name,
          'username' => $user->username,
          'phone' => $user->phone,
          'email' => $user->email
        ],
      ],
    ]);
  }

  public function logout(Request $request)
  {
    $request->user()->currentAccessToken()->delete();

    return response()->json([
      'status' => 'success',
      'message' => 'Logout successful'
    ]);
  }
}
