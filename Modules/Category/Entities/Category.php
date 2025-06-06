<?php

namespace Modules\Category\Entities;

use TypiCMS\NestableTrait;
use Modules\Media\Entities\File;
use Modules\Support\Eloquent\Model;
use Modules\Media\Eloquent\HasMedia;
use Illuminate\Support\Facades\Cache;
use Modules\Product\Entities\Product;
use Modules\Support\Eloquent\Sluggable;
use Modules\Support\Eloquent\Translatable;
use Themes\Furniture\CategoryRouteService;
use Modules\Meta\Eloquent\HasMetaData;
use Modules\Slider\Entities\Slider;

class Category extends Model
{
    use Translatable, Sluggable, HasMedia, NestableTrait, HasMetaData;

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
    protected $fillable = ['slider_id', 'parent_id', 'slug', 'position', 'is_searchable', 'is_active', 'slider_2_id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = ['translations'];

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
    protected $translatedAttributes = ['name', 'intro'];

    /**
     * The attribute that will be slugged.
     *
     * @var string
     */
    protected $slugAttribute = 'name';

    protected $appends = [
        'logo', 'banner'
    ];

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
        return static::with('files', 'meta')->where('slug', $slug)->firstOrFail();
    }
    
     public static function findBySlugV2($slug)
    {
        return static::with('files', 'meta')->where('slug', $slug)->first();
    }

    public function isRoot()
    {
        return $this->exists && is_null($this->parent_id);
    }

    public function url()
    {
        return route('product.category', ['slug' => $this->slug]);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    public static function tree()
    {
        return Cache::tags('categories')
            ->rememberForever(md5('categories.tree:' . locale()), function () {
                return static::with('files')
                    ->orderByRaw('-position DESC')
                    ->get()
                    ->nest();
            });
    }

    public static function treeList()
    {
        return Cache::tags('categories')->rememberForever(md5('categories.tree_list:' . locale()), function () {
            return static::orderByRaw('-position DESC')
                ->get()
                ->nest()
                ->setIndent('¦–– ')
                ->listsFlattened('name');
        });
    }

    public static function treeListRecursive($listId)
    {
        return static::whereIn('id', $listId)->orderByRaw('-position DESC')
            ->get()
            ->nest()
            ->setIndent('¦–– ')
            ->listsFlattened('name');
    }

    public static function searchable()
    {
        return Cache::tags('categories')
            ->rememberForever(md5('categories.searchable:' . locale()), function () {
                return static::where('is_searchable', true)
                    ->get()
                    ->map(function ($category) {
                        return [
                            'slug' => $category->slug,
                            'name' => $category->name,
                        ];
                    });
            });
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }


    public function getLogoAttribute()
    {
        return $this->files->where('pivot.zone', 'logo')->first() ?: new File;
    }

    public function getBannerAttribute()
    {
        return $this->files->where('pivot.zone', 'banner')->first() ?: new File;
    }

    public function getRouteAttribute()
    {
        $categoryRouteService = app(CategoryRouteService::class);
        return $categoryRouteService->getRoute($this);
    }

    public static function getProductWithCategory($slug) {
        return self::where('slug', $slug)->first()->products();
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

    public function slider()
    {
        return $this->belongsTo(Slider::class, 'slider_id');
    }

    public function slider2()
    {
        return $this->belongsTo(Slider::class, 'slider_2_id');
    }
}
