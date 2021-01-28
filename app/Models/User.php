<?php


namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use \Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'surname', 'email', 'password', 'role_id'];

    public function logactions()
    {
        return $this->hasMany(LogAction::class);
    }

    public function user_ships()
    {
        return $this->belongsToMany(User_Ship::class);
    }

    public function user_ranks()
    {
        return $this->hasMany(User_Rank::class);
    }

    public static function login($email, $password)
    {
        return DB::table('users')->where([
            'email' => $email,
            'password' => sha1($password)
        ])->get(['id', 'name', 'surname', 'email', 'password', 'role_id'])->first();
    }


    public static function getAll()
    {
        return User::withoutTrashed()->get();
    }

    public static function getOne($user)
    {
        return User::with('user_ranks')->find($user);
    }

    public static function store($array)
    {

        $u = new User();
        $u->name = $array['name'];
        $u->surname = $array['surname'];
        $u->email = $array['email'];
        $u->password = sha1($array['password']);
        $u->role_id = $array['role_id'];
        $u->save();


        if($array['rank_id'] !== null){
            foreach ($array['rank_id'] as $rank){
                DB::table('users_ranks')->insert([
                    'user_id' => $u->id,
                    'rank_id' => $rank,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
        }
    }

    public static function getCrew()
    {
        return User::withoutTrashed()->where('role_id','=', 2)->get();
    }

    public static function edit($data, $user)
    {
        User::find($user)->update($data);

        if($data['ranks'] !== null){
            foreach ($data['ranks'] as $rank){
                User_Rank::upsert([
                    'user_id' => $user,
                    'rank_id' => $rank
                ],['user_id'],['rank_id']);
            }
        }
    }

    public static function getNotificationsForCrewMember($id)
    {
        return DB::table('notifications as n')
            ->join('notifications_ranks as nr','n.id','=','nr.notification_id')
            ->join('ranks as r','nr.rank_id','=','r.id')
            ->join('users_ranks as ur','r.id','=','ur.rank_id')
            ->join('users as u','ur.user_id','=','u.id')
            ->where('u.id','=',$id)
            ->where('n.deleted_at','=',NULL)
            ->where('r.deleted_at','=',NULL)
            ->where('u.deleted_at','=',NULL)
            ->groupBy(['content'])->get(['content']);
    }
    public static function remove($id)
    {
        User::find($id)->delete();
    }
}
