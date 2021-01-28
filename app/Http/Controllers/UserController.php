<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\LogAction;
use App\Models\Rank;
use App\Models\Role;
use App\Models\User;
use App\Models\User_Rank;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        try{
            $users = User::getAll();
            return view('pages.user.index')->with('users', $users);
        }
        catch (\Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }

    public function create()
    {
       try{
           $roles = Role::getAll();
           $ranks = Rank::getAll();
           return view('pages.user.create')
               ->with('roles', $roles)
               ->with('ranks', $ranks);
       }
       catch (\Exception $exception){
           Log::alert($exception->getMessage());
           return response(null, 500);
       }
    }

    public function store(UserCreateRequest $request)
    {
        try{
            User::store($request->toArray());
            LogAction::store('user created', session()->get('user')->id);
            return response(null);
        }
        catch (\Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }


    public function edit($user)
    {
        try{
            $data['user'] = User::getOne($user);
            $data['ranks'] = Rank::getAll();
            $data['roles'] = Role::getAll();
            return view('pages.user.edit', $data);
        }
        catch(QueryException | \Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }


    public function update(UserUpdateRequest $request, $user)
    {
        try{
            User_Rank::removeForeignKeys($user);
            User::edit($request->toArray(), $user);
            LogAction::store('user altered',session()->get('user')->id);
            return response(null, 204);
        }
        catch(QueryException | \Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }


    public function destroy($user)
    {
        try{
            User::remove($user);
            return response(null, 204);
        }
        catch(QueryException | \Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }
}
