<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAction extends Model
{
    public static function getAll()
    {
        return LogAction::with('user')->get();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function store($action, $user)
    {
        $lga = new LogAction();
        $lga->action = $action;
        $lga->user_id = $user;
        $lga->save();
    }
}
