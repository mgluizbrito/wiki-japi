<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 'specialists';
    protected $fillable = [
        'user_id',
        'lattes_url',
        'area',
    ];

    /**
     * Get the user that owns the specialist.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
