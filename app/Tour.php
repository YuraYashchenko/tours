<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $guarded = [];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function scopeGetServices()
    {
        $names = $this->services()->pluck('name')->toArray();

        return implode(', ', $names);
    }

    public function getImageAttribute($avatar)
    {
        return asset($avatar ?: 'images/default.png');
    }
}
