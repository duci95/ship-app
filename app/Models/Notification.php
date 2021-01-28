<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Notification extends Model
{
    use SoftDeletes;

    protected $fillable = ['content'];

    public static function getAll()
    {
        return Notification::withoutTrashed()->get();
    }

    public static function getNotificationTargets($notification)
    {
        return DB::table('notifications as n')
            ->join('notifications_ranks as nr','n.id','=','nr.notification_id')
            ->join('ranks as r','nr.rank_id','=','r.id')
            ->join('users_ranks as ur','r.id','=','ur.rank_id')
            ->join('users as u','ur.user_id','=','u.id')
            ->where('n.id','=',$notification)
            ->where('n.deleted_at','=',NULL)
            ->where('r.deleted_at','=',NULL)
            ->where('u.deleted_at','=',NULL)
            ->groupBy(['u.surname','u.name','u.email'])->get(['u.name', 'u.surname','u.email']);
    }
    public static function store($data)
    {
        $n = new Notification();

        $n->content = $data['content'];

        $n->save();

        foreach ($data['ranks'] as $rank){
            Notification_Rank::upsert([
                'notification_id' => $n->id,
                'rank_id' => $rank
            ],['notification_id'],['rank_id']);
        }
    }
    public function notification_ranks()
    {
        return $this->hasMany(Notification_Rank::class);
    }
    public static function getOne($notification)
    {
        return Notification::with('notification_ranks')->find($notification);
    }

    public static function edit($data, $notification)
    {
        Notification::find($notification)->update($data);

        foreach ($data['ranks'] as $rank){
            Notification_Rank::upsert([
                'notification_id' => $notification,
                'rank_id' => $rank
            ],['notification_id'],['rank_id']);
        }
    }

    public static function remove($id)
    {
        Notification::find($id)->delete();
    }
}
