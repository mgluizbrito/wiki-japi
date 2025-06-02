<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;

class Specie extends Model
{
    protected $table = "species";
    protected $fillable = [
        'sci_name',
        'common_name',
        'description',
        'photo_url',
    ];

    public function communityIdentifications()
    {
        return $this->hasMany(CommunityIdentification::class);
    }
}
