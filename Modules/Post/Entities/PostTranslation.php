<?php

namespace Modules\Post\Entities;

use Modules\Support\Eloquent\TranslationModel;

class PostTranslation extends TranslationModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','content'];
}
