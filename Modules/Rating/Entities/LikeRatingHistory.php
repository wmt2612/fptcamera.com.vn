<?php

namespace Modules\Rating\Entities;

use Illuminate\Database\Eloquent\Model;

class LikeRatingHistory extends Model
{
    const TABLE_NAME = 'like_rating_histories';
    const RATING_ID = 'rating_id';
    const IP_ADDRESS = 'ip_address';

    protected $fillable = [
        self::RATING_ID,
        self::IP_ADDRESS
    ];
}
