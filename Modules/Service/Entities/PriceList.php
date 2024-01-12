<?php

namespace Modules\Service\Entities;

use Illuminate\Database\Eloquent\Model;

class PriceList extends Model
{   
    protected $table = 'area_services';

    protected $fillable = [
        'type',
        'price_area',
        'price_area_discount'
    ];
}
