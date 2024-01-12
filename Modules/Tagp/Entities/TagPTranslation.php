<?php

namespace Modules\Tagp\Entities;

use Modules\Support\Eloquent\TranslationModel;

class TagPTranslation extends TranslationModel
{
    protected $table = 'tag_p_translations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
