<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $http = new \GuzzleHttp\Client;

        try {
            
            $response = $http->post(env('LOGIN_ENDPOINT'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => env('CLIENT_ID'),
                    'client_secret' => env('CLIENT_SECRET'),
                    'username' => $request->username,
                    'password' => $request->password
                ]
            ]);
            return $response->getBody();
        } catch (\GuzzleHttp\Exception\BadResponseExceptionException $e) {
            
            if ($e->getCode() == 400) {
                return response()->json('Invalid request', $e->getCode());
            } else if ($e->getCode() == 401) {
                return response()->json('Invalid credentials', $e->getCode());
            }
            return response()->json('Something went wrong on the server', $e->getCode());
        } catch(\Exception $e){
            return response()->json($e->getMessage(),$e->getCode());
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    public function logout()
    {

        auth()->user()->tokens->each(function ($token,$key){
            $token->delete();
        });

        return response()->json('Logged out successfully');
    }
}
