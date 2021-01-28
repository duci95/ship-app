<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    protected $fillable = ['name'];
    use SoftDeletes;
    public static function getAll()
    {
        return DB::table('roles')->get();
    }
}
