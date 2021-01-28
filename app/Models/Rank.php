<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rank extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    public static function getAll()
    {
        return Rank::withoutTrashed()->get();
    }
    public function user_ranks()
    {
        return $this->belongsToMany(User_Rank::class);
    }

    public static function store($data)
    {
        $r = new Rank();

        $r->name = $data['name'];

        $r->save();
    }

    public static function getOne($rank)
    {
        return Rank::withoutTrashed()->find($rank);
    }

    public static function edit($data, $rank)
    {
        Rank::find($rank)->update($data);
    }

    public function notification_ranks()
    {
        return $this->hasMany(Notification_Rank::class);
    }

    public static function remove($id)
    {
        Rank::find($id)->delete();
    }
}
