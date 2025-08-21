<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'dashboard';
    protected $fillable = ['user_id','last_login'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
