<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * Login the user
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        if (!auth()->attempt($request->validated())) {
            return response()->json([
                    'error'   => 'Unauthorized',
                    'message' => trans('auth.failed'),
            ], 403);
        }

        return response()->json([
                'access_token' => auth()->user()->createToken('authToken')->plainTextToken,
                'user'         => new UserResource(auth()->user()),
        ]);
    }

    /**
     * Register a new user
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
        ]);

        return response()->json([
                'access_token' => $user->createToken('authToken')->plainTextToken,
                'user'         => new UserResource($user),
        ]);
    }


    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function me()
    {
        return response()->json([
                'user' => new UserResource(auth()->user()),
        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->json([
                'message' => 'Successfully logged out'
        ]);
    }
}
