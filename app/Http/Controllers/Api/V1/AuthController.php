<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function login(AuthenticateUserRequest $request)
    {
        $credentials = $request->validated();

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
           return ApiResponse::error(
            'Invalid Credentials',
            Response::HTTP_UNAUTHORIZED
           );
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return ApiResponse::success([
            'token'=> $token,
            'user' => new UserResource($user)
        ],
        'Login successful'
        );
    }

    public function me(Request $request)
    {
        return ApiResponse::success(new UserResource($request->user()),
        'User Data'
        );
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return ApiResponse::success(null, 'Logged out successfully');
    }
}