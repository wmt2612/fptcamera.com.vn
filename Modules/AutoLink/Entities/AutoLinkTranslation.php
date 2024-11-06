<?php

namespace Modules\AutoLink\Entities;

use Modules\Support\Eloquent\TranslationModel;

class AutoLinkTranslation extends TranslationModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];
}
