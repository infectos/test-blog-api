<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiResponseHelpers;

    public function register(CreateUserRequest $request)
    {
        $data = $request->safe()->only(['name', 'password','email']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return $this->respondCreated([
            'token' => $user->createToken('API Token')->plainTextToken
        ]);
    }

    public function login(LoginRequest $request)
    {
        $data = $request->safe()->only(['email','password']);
        if (!Auth::attempt($data)) {
            $response = ['errors' => ['Credentials not match']];
            return $this->apiResponse($response, 401);
        }

        return $this->respondWithSuccess([
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        Auth::guard('web')->logout();

        return $this->respondWithSuccess(['Logged out']);
    }
}
