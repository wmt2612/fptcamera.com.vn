<?php

namespace Modules\Service\Entities;

use Modules\Support\Eloquent\Model;
use Modules\Support\Eloquent\Translatable;
use Modules\Media\Entities\File;
use Modules\Support\Money;
use Modules\Option\Entities\Option;
use Modules\Media\Eloquent\HasMedia;
use Modules\Support\Eloquent\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\CategoryService\Entities\CategoryService;
use Modules\Service\Admin\ServiceTable;
use Modules\Area\Entities\Area;

class Service extends Model
{
    use Translatable, Sluggable, HasMedia, SoftDeletes;


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
        'price',
        'bandwidth',
        'slug',
        'price',
        'category_service_id',
        'is_hot'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'base_image', 'base_image_icon'
    ];


    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatedAttributes = ['name', 'feature'];

    /**
     * The attribute that will be slugged.
     *
     * @var string
     */
    protected $slugAttribute = 'name';


    protected static function booted()
    {
        static::saved(function ($service) {
            if (! empty(request()->all())) {
                $service->saveRelations(request()->all());
            }
        });
    }

    public function areas($area_id = [])
    {
        return $this->belongsToMany(Area::class, 'area_services')->whereIn('area_id', $area_id)->withPivot('price_area');
    }

    public function scopeWithName($query)
    {
        $query->with('translations:id,service_id,locale,name');
    }

    public function options()
    {
        return $this->belongsToMany(Option::class, 'service_options')
            ->orderBy('position')
            ->withTrashed();
    }


    public function scopeWithBaseImage($query)
    {
        $query->with(['files' => function ($q) {
            $q->wherePivotIn('zone', ['base_image', 'base_image_icon']);
        }]);
    }

    public function category_services()
    {
        return $this->belongsTo(CategoryService::class, 'category_service_id');
    }

    /**
     * Get the product's base image.
     *
     * @return \Modules\Media\Entities\File
     */
    public function getBaseImageAttribute()
    {
        return $this->files->where('pivot.zone', 'base_image')->first() ?: new File;
    }

    /**
     * Get the product's base image.
     *
     * @return \Modules\Media\Entities\File
     */
    public function getBaseImageIconAttribute()
    {
        return $this->files->where('pivot.zone', 'base_image_icon')->first() ?: new File;
    }


    /**
     * Get product's additional images.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAdditionalImagesAttribute()
    {
        return $this->files
            ->where('pivot.zone', 'additional_images')
            ->sortBy('pivot.id');
    }

    public function getPriceAttribute($price)
    {
        return Money::inDefaultCurrency($price);
    }

    /**
     * Get table data for the resource
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function table($request)
    {
        $query = $this->newQuery()
            ->withoutGlobalScope('active')
            ->withName()
            ->withBaseImage()
            ->withPrice()
            ->addSelect(['id', 'created_at'])
            ->when($request->has('except'), function ($query) use ($request) {
                $query->whereNotIn('id', explode(',', $request->except));
            });

        return new ServiceTable($query);
    }

    public function saveRelations($attributes = [])
    {
        $data = [];
        foreach ($attributes['areas'] as $key => $value) {
            $data[$value] = [
                'price_area'    => $attributes['price_area'][$key]
            ];
        }
        // dd($data);
        // dd(array_get($attributes, 'areas', []));
        $this->areas()->sync($data);
    }

    public function scopeWithPrice($query)
    {
        $query->addSelect([
            'services.price'
        ]);
    }

}
