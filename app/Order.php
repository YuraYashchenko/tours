<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'tour_id', 'number', 'start_date', 'end_date', 'price', 'food_type', 'room_type'];

    protected $dates = ['start_date', 'end_date'];

    /**
     * Get user related to order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get tour related to order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    /**
     * End date mutator.
     *
     * @param $date
     * @return string
     */
    public function getEndDateAttribute($date)
    {
        return Carbon::parse($date)->format('d M Y');
    }

    /**
     * Start date mutator.
     *
     * @param $date
     * @return string
     */
    public function getStartDateAttribute($date)
    {
        return Carbon::parse($date)->format('d M Y');
    }
}
