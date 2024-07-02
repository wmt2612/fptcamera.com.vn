<?php

namespace Modules\Page\Entities;


use Modules\Support\Eloquent\Model;

class PageCategory extends Model
{
    protected $fillable = [
        'page_id', 'category_id'
    ];
}
