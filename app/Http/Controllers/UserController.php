<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth; //use this library
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
     /**
     * Instantiate a new UserController instance that guarded by auth middleware.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Get the authenticated User.
     *
     * @return Response
     */
    public function profile()
    {        
        $user = Auth::user();
        $profile = $user->student;
        return $user;
        
    }

    public function getAll(){
        $user = User::All();
        
        return $user;
    }

    public function resetPassword(Request $request){
        $id = $request->input('id');

        $user = User::find($id);
        $user->password = Hash::make('123456');
        $user->save();

        return $user;
    }

    public function changePassword(Request $request){
        $id = $request->input('id');

        $this->validate($request, [
            'password'         => 'required',
            'password_confirm' => 'required|same:password' 
        ]);
        $cur_password = Hash::make($request->input('cur_password'));

        $user = User::find($id);
        // if($user->password == $cur_password){
            $user->password = Hash::make($request->input('password'));
            $user->save();    
        // }    
        

        return $user;
    }

    /**
     * Get all User.
     *
     * @return Response
     */
    public function allUsers()
    {
        $token = JWTAuth::getToken();
        return response()->json(['users' =>  User::all()], 200);
    }

    /**
     * Get one user by id.
     *
     * @return Response
     */
    public function singleUser($id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json(['user' => $user], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'user not found!'], 404);
        }

    }

    /**
     * Invalidate provided token.
     *
     * @return Response
     */
    public function logout()
    {        
        Auth::invalidate();
        return response()->json(['message' => 'provided token invalidated'], 200);
    }

}
