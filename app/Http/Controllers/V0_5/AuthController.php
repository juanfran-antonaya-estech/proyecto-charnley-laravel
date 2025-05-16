<?php

namespace App\Http\Controllers\V0_5;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'token' => $token,
                'user' => $user
            ]);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function unlog(Request $request){
        $user = Auth::user();
        if ($user) {
            $user->tokens()->delete();
            return response()->json(['message' => 'Logged out successfully']);
        }

        return response()->json(['message' => 'User not found'], 404);
    }

    public function changePassword(Request $request){
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|different:current_password',
        ]);

        $user = Auth::user();
        if ($user && password_verify($request->current_password, $user->password)) {
            $user->password = bcrypt($request->new_password);
            $user->save();

            return response()->json(['message' => 'Password changed successfully']);
        }

        return response()->json(['message' => 'Current password is incorrect'], 401);
    }

    public function getUserToken(Request $request){
        $user = Auth::user();
        if ($user) {
            return response()->json(['token' => $user->createToken('auth_token')->plainTextToken]);
        }

        return response()->json(['message' => 'User not found'], 404);
    }
}
