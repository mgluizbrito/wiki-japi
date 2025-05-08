<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpertValidation extends Model
{
    protected $fillable = [
        'identification_id',
        'specialist_id',
        'comment',
    ];

    public function communityIdentification()
    {
        return $this->belongsTo(CommunityIdentification::class);
    }

    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }
}
