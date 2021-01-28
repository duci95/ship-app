<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Ship extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'serial_number', 'image'];

    public function users_ships()
    {
        return $this->hasMany(User_Ship::class);
    }

    public static function getAll()
    {
       return Ship::withoutTrashed()->get();
    }

    public static function store($data)
    {
       $s = new Ship();

       $s->name = $data['name'];
       $s->serial_number = $data['serial'];
       $s->image = $data['image_name'];

       $s->save();

       $arr = explode(',',$data['crews']);
       foreach ($arr as $crew){
           $us = new User_Ship();
           $us->user_id = $crew;
           $us->ship_id = $s->id;
           $us->save();
       }
    }

    public static function getOne($ship)
    {
        return Ship::withoutTrashed()->with('users_ships')->find($ship);
    }

    public static function edit($data, $ship)
    {
        Ship::find($ship)->update($data);

        $crews = explode(',',$data['crews']);

        foreach ($crews as $crew){
            User_Ship::upsert([
                'user_id' => $crew,
                'ship_id' => $ship
            ],['user_id'],['ship_id']);
        }
    }
    public static function remove($id)
    {
        Ship::find($id)->delete();
    }
}
