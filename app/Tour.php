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

    public function setPriceAttribute($price)
    {
        $this->attributes['price'] = $price * 100;
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
     * Get order related to the tour.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
