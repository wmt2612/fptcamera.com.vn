<?php

namespace Modules\CategoryService\Entities;

use Modules\Support\Eloquent\TranslationModel;

class CategoryServiceTranslation extends TranslationModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'intro', 'meta_description', 'meta_keyword'];
}
