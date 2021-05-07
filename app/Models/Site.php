<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function stats()
    {
        return $this->hasMany(SiteStat::class);
    }
}
