<?php

namespace Modules\AutoLink\Entities;

use Modules\AutoLink\Admin\AutoLinkTable;
use Modules\Support\Eloquent\Model;
use Modules\Support\Eloquent\Translatable;

class AutoLink extends Model
{
    use Translatable;

    const RENDER_FOR_PAGE = 'page';
    const RENDER_FOR_POST = 'post';

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'target_url',
        'target_type',
        'is_duplicate',
        'is_active',
        'for_post',
        'for_page',
        'is_override'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'for_post' => 'boolean',
        'for_page' => 'boolean',
        'is_duplicate' => 'boolean',
        'is_active' => 'boolean',
        'is_override' => 'boolean'
    ];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatedAttributes = [
        'title'
    ];

    protected static function booted()
    {
        static::addActiveGlobalScope();
    }

    /**
     * Get table data for the resource
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function table()
    {
        return new AutoLinkTable($this->newQuery()
            ->latest()
            ->withoutGlobalScope('active'));
    }

    public function getUrl($title = null)
    {
        $title = $title ?? $this->title;
        return "<a href='{$this->target_url}' target='{$this->target_type}'>{$title}</a>";
    }
}
