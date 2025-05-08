<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;

class Observation extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 'observations';
    protected $fillable = [
        'user_id',
        'photo_url',
        'date',
        'latitude',
        'longitude',
    ];

    /**
     * Get the user that owns the observation.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
