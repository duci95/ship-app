<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShipCreateRequest;
use App\Http\Requests\ShipUpdateRequest;
use App\Models\LogAction;
use App\Models\Ship;
use App\Models\User;
use App\Models\User_Ship;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class ShipController extends Controller
{
    public function index()
    {
        try{
            $ships = Ship::getAll();
            return view('pages.ship.index')->with('ships', $ships);
        }
        catch (\Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }


    public function create()
    {
        try{
            $crews = User::getCrew();
            return view('pages.ship.create')->with('crews', $crews);
        }
        catch (\Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }


    public function store(ShipCreateRequest $request)
    {
        $image = $request->file('image');
        if($image->isValid()){

            $image_name = time().'_'.$image->getClientOriginalName();
            $path = public_path('images/'. $image_name);
            $request['image_name'] = $image_name;
            Image::make($image->getRealPath())->resize(50,50)->save($path, 100);

            try{
                Ship::store($request->toArray());
                LogAction::store('ship created', session()->get('user')->id);
                return response(null, 201);
            }
            catch (QueryException $exception){
                Log::alert($exception->getMessage());
                return response(null, 422);
            }
            catch (\Exception $exception){
                Log::alert($exception->getMessage());
                return response(null, 500);
            }
        }
        else{
            return response(null, 400);
        }
    }




    public function edit($ship)
    {
        $data['ship'] = Ship::getOne($ship);
        $data['crews'] = User::getCrew();
        return view('pages.ship.edit', $data);
    }

    public function update(ShipUpdateRequest $request, $ship)
    {
        if($request->file('picture') !== null){
            $image = $request->file('picture');
            if($image->isValid()){
                $image_name = time().'_'.$image->getClientOriginalName();
                $path = public_path('images/'. $image_name);
                $request['image'] = $image_name;

                unlink('images/'.$request['old_image']);

                Image::make($image->getRealPath())->resize(50,50)->save($path, 100);

                try {
                    User_Ship::removeForeignKeys($ship);
                    Ship::edit($request->toArray(), $ship);
                    return response(null, 204);

                } catch (QueryException $exception) {

                    Log::alert($exception->getMessage());
                    return response(null, 409);

                } catch (\Exception $exception) {

                    Log::alert($exception->getMessage());
                    return response(null, 500);
                }
            }
            else{
                return response(null, 400);
            }
        }
        else{
            try {
                User_Ship::removeForeignKeys($ship);
                Ship::edit($request->toArray(), $ship);
                return response(null, 204);
            } catch (QueryException $exception) {
                Log::alert($exception->getMessage());
                return response(null, 409);
            } catch (\Exception $exception) {
                Log::alert($exception->getMessage());
                return response(null, 500);
            }
        }
    }


    public function destroy($ship)
    {
        try{
            Ship::remove($ship);
            return response(null, 204);
        }
        catch(QueryException | \Exception $exception){
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }
}
