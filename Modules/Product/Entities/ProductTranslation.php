<?php

namespace Modules\Product\Entities;

use Modules\Support\Eloquent\TranslationModel;

class ProductTranslation extends TranslationModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'short_name', 'description', 'short_description', 'specifications', 'gift_note', 'info_1', 'info_2'];
}
