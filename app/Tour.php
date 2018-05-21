<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $guarded = [];

    protected $casts = ['price' => 'integer'];

    /**
     * Get all services for a tour.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    /**
     * Mutator for image field.
     *
     * @param $avatar
     * @return string
     */
    public function getImageAttribute($avatar)
    {
        return asset($avatar ?: 'images/default.png');
    }

    /**
     * Mutator for end_date field.
     *
     * @param $date
     * @return string
     */
    public function getEndDateAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('M j Y');
    }

    /**
     * Mutator for start_date field.
     *
     * @param $date
     * @return string
     */
    public function getStartDateAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('M j Y');
    }

    /**
     * Get users which ordered tour.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user()
    {
        return $this->belongsToMany(Tour::class);
    }
}
