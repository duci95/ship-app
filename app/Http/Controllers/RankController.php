<?php

namespace App\Http\Controllers;

use App\Http\Requests\RankCreateRequest;
use App\Models\LogAction;
use App\Models\Rank;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RankController extends Controller
{

    public function index()
    {
        try{
            $ranks = Rank::getAll();
            return view('pages.rank.index')->with('ranks', $ranks);
        }
        catch(QueryException | \Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }

    public function create()
    {
        return view('pages.rank.create');
    }

    public function store(RankCreateRequest $request)
    {
        try{
            Rank::store($request->toArray());
            LogAction::store('rank created', session()->get('user')->id);
            return response(null, 201);
        }
        catch(QueryException | \Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }


    public function edit($rank)
    {
        try{
            $rank = Rank::getOne($rank);
            return view('pages.rank.edit')->with('rank', $rank);
        }
        catch(QueryException | \Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }


    public function update(RankCreateRequest $request, $rank)
    {
        try{
            Rank::edit($request->toArray(), $rank);
            return response(null, 204);
        }
        catch(QueryException | \Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }


    public function destroy($rank)
    {
        try{
            Rank::remove($rank);
            return response(null, 204);
        }
        catch(QueryException | \Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }
}
