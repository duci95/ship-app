<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');

        try{
            $user = User::login($email, $password);

            if($user){
                $request->session()->put('user', $user);
                return response(null);
            }
            else{
                return response(null, 404);
            }
        }
        catch(QueryException $exception){
            Log::alert($exception->getMessage());
            return response(null, 400);
        }
        catch (\Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        $request->session()->flush();
        return redirect()->route('login');
    }
}
