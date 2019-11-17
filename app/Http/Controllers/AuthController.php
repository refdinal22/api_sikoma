<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request)
    {        
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        try {
            $user = new User;

            $user->username = $request->input('username');         
            $user->password = Hash::make($request->input('password'));
            $user->role = $request->input('role');
            $user->save();            

            return response()->json(['user' => $user, 'message' => 'CREATED'], 201);
        } catch (\Exception $e) {            
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }

    }

    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {        
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);    

        $credentials = $request->only(['username', 'password']);
        try {
            if (!$token = Auth::attempt($credentials)) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }
        }catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], 500);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], 500);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent' => $e->getMessage()], 500);
        }        

        $user = Auth::user();
        $profile = null;
        if($user->role == 1){
            $profile = $user->student;
        }
        else if($user->role == 2){
            $profile = $user->lecturer;
        }

        return response()->json([
            'user' => $user,            
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL().' minutes'
        ], 200);
    }

}
