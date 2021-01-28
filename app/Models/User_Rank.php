<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_Rank extends Model
{
    protected $table = 'users_ranks';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public static function removeForeignKeys($id)
    {
        DB::table('users_ranks')->where('user_id','=',$id)->delete();
    }
}
