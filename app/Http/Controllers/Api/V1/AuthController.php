<?php

namespace App\Http\Controllers\Api\V1;


use App\Models\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\UserRegisterRequest;
use App\Http\Requests\V1\UserLoginRequest;
use App\Http\Resources\V1\UserResource;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /**
     * Register a new user on the app.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register (UserRegisterRequest $request) {
        $userData = $request->all();
        $userData['password'] = bcrypt($userData['password']);
        $user = User::create($userData);
        $token= $user->createAuthToken();

        $response = [
            'data' => new UserResource($user),
            'token' => $token
        ];
        return response($response, 201);
    }
    /**
     * Login the new user to the app.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login (UserLoginRequest $request) {
        if(Auth::attempt($request->All())) {
            $user =  Auth::user();
            $token = $user->createAuthToken();
            $response = [
                'data' => new UserResource($user),
                'token' => $token
            ];
            return response($response, 201);
        }
        return response([
            'message' => 'Bad Credentials'
        ], 401);
    }
    /**
     * Logout the user from the app
     *
     * @return \Illuminate\Http\Response
     */
    public function logout () {
        Auth::user()->tokens()->delete();
        $response = [
            'message' => "Logged out"
        ];

        return response($response, 200);
    }
}
