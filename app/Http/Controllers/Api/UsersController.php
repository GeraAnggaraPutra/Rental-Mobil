<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    // public function login()
    // {
    //     if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
    //         $user = Auth::user();
    //         $success['token'] = $user->createToken('appToken')->accessToken;
    //         return response()->json([
    //             'success' => true,
    //             'token' => $success,
    //             'user' => $user,
    //         ]);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Invalid Email or Password',
    //         ], 401);
    //     }
    // }

    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8'],
    //     ]);
    //     if ($validator->fails()) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => $validator->errors(),
    //         ], 401);
    //     }
    //     $input = $request->all();
    //     $input['password'] = bcrypt($input['password']);
    //     $input['role'] = 'guest';
    //     $user = User::create($input);
    //     $success['token'] = $user->createToken('appToken')->accessToken;
    //     return response()->json([
    //         'success' => true,
    //         'token' => $success,
    //         'user' => $user,
    //     ]);
    // }

    // public function logout(Request $request)
    // {
    //     if (Auth::user()) {
    //         $user = Auth::user()->token();
    //         $user->revoke();
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Logout successfully',
    //         ]);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Unable to Logout',
    //         ]);
    //     }
    // }

    // public function getUser(){
    //     $user = Auth::user();
    //     return response()->json([
    //         'user' => $user,
    //         'success' => true,
    //     ], 200);
    // }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function login(Request $request)
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login success',
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'message' => 'logout success'
        ]);
    }


}
