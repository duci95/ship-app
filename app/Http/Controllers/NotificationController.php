<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationCreateRequest;
use App\Models\LogAction;
use App\Models\Notification;
use App\Models\Notification_Rank;
use App\Models\Rank;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    public function index()
    {
        try{
            $notes = Notification::getAll();
            return view('pages.notification.index')->with('notes', $notes);
        }
        catch (QueryException | \Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }

    public function create()
    {
        try{
            $ranks = Rank::getAll();
            return view('pages.notification.create')->with('ranks', $ranks);
        }
        catch (QueryException | \Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }


    public function store(NotificationCreateRequest $request)
    {
        try{
            Notification::store($request->toArray());
            LogAction::store('notification created', session()->get('user')->id);
            return response(null, 201);
        }
        catch (QueryException | \Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }


    public function show($notification)
    {
        try{
            $results = Notification::getNotificationTargets($notification);
            return view('pages.notification.show')->with('results', $results);
        }
        catch (QueryException | \Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }


    public function edit(Notification $notification)
    {
        try{
            $data['note'] = Notification::getOne($notification);
            $data['ranks'] = Rank::getAll();
            return view('pages.notification.edit', $data);
        }
        catch (QueryException | \Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }


    public function update(Request $request, $notification)
    {
        try{
            Notification_Rank::removeForeignKeys($notification);
            Notification::edit($request->toArray(), $notification);
            LogAction::store('notification altered', session()->get('user')->id);
            return response(null, 204);
        }
        catch(QueryException | \Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }


    public function destroy($notification)
    {
        try{
           Notification::remove($notification);
           return response(null, 204);
        }
        catch(QueryException | \Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }
}
