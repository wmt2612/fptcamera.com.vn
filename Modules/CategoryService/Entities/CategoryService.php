<?php

namespace Modules\CategoryService\Entities;

use Modules\Support\Eloquent\Model;
use Modules\Support\Eloquent\Translatable;
use Modules\Meta\Eloquent\HasMetaData;
use Modules\Media\Eloquent\HasMedia;
use TypiCMS\NestableTrait;
use Illuminate\Support\Facades\Cache;
use Modules\Support\Eloquent\Sluggable;
use Modules\Service\Entities\Service;
use Modules\Media\Entities\File;

class CategoryService extends Model
{
    use Translatable, HasMetaData, NestableTrait, Sluggable, HasMedia;

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
        'parent_id', 'slug', 'position'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_searchable' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatedAttributes = ['name', 'intro'];

    /**
     * The attribute that will be slugged.
     *
     * @var string
     */
    protected $slugAttribute = 'name';

    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addActiveGlobalScope();
    }

    public static function findBySlug($slug)
    {
        return static::with('files')->where('slug', $slug)->firstOrNew([]);
    }

    public function parent()
    {
        return $this->belongsTo(CategoryService::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(CategoryService::class, 'parent_id', 'id');
    }

    public function isRoot()
    {
        return $this->exists && is_null($this->parent_id);
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'category_service_id');
    }

    public static function tree()
    {
        return Cache::tags('category_services')
            ->rememberForever(md5('category_services.tree:' . locale()), function () {
                return static::with('files')
                    ->orderByRaw('-position DESC')
                    ->get()
                    ->nest();
            });
    }

    public static function treeList()
    {
        return Cache::tags('category_services')->rememberForever(md5('category_services.tree_list:' . locale()), function () {
            return static::orderByRaw('-position DESC')
                ->get()
                ->nest()
                ->setIndent('¦–– ')
                ->listsFlattened('name');
        });
    }

    public function getLogoAttribute()
    {
        return $this->files->where('pivot.zone', 'logo')->first() ?: new File;
    }

    public function getBannerAttribute()
    {
        return $this->files->where('pivot.zone', 'banner')->first() ?: new File;
    }


    public function toArray()
    {
        $attributes = parent::toArray();

        if ($this->relationLoaded('files')) {
            $attributes += [
                'logo' => [
                    'id' => $this->logo->id,
                    'path' => $this->logo->path,
                    'exists' => $this->logo->exists,
                ],
                'banner' => [
                    'id' => $this->banner->id,
                    'path' => $this->banner->path,
                    'exists' => $this->banner->exists,
                ],
            ];
        }

        return $attributes;
    }
}
