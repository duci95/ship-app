<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notification_Rank extends Model
{
    protected $table = 'notifications_ranks';

    protected $fillable = ['notification_id', 'rank_id'];

    public function notification()
    {
        return $this->belongsToMany(Notification::class);
    }
    public function rank()
    {
        return $this->belongsToMany(Rank::class);
    }
    public static function removeForeignKeys($id)
    {
        DB::table('notifications_ranks')->where('notification_id','=',$id)->delete();
    }
}
