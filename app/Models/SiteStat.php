<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteStat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'click_pointer',
        'realtime_created_at',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }
}
