<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityIdentification extends Model
{
    protected $table = "community_identifications";
    protected $fillable = [
        'observation_id',
        'user_id',
        'specie_id',
    ];

    public function observation()
    {
        return $this->belongsTo(Observation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specie()
    {
        return $this->belongsTo(Specie::class);
    }
}
