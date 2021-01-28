<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FrontendController extends Controller
{
    public function login()
    {
        return view('pages.login');
    }

    public function index()
    {
        if(session()->get('user')->role_id === 2){
            try{
                $id = session()->get('user')->id;
                $data = User::getNotificationsForCrewMember($id);
                return view('pages.index')->with('data', $data);
            }
            catch(QueryException | \Exception $exception){
                Log::alert($exception->getMessage());
                return redirect()->route('login');
            }
        }
        else{
            return view('pages.index');
        }
    }
}
