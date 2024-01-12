<?php

namespace Modules\Group\Entities;

use Modules\Support\Eloquent\TranslationModel;

class GroupTranslation extends TranslationModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
