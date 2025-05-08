<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atropelamento extends Model
{
    protected $fillable = [
        'photo',
        'datetime',
        'latitude',
        'longitude',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
