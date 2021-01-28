<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_Ship extends Model
{
    protected $table = 'users_ships';
    protected $fillable = ['user_id', 'ship_id'];

    public function ship()
    {
        return $this->belongsTo(Ship::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function removeForeignKeys($id)
    {
        DB::table('users_ships')->where('ship_id','=',$id)->delete();
    }
}
