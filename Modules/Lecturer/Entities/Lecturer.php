<?php

namespace Modules\Lecturer\Entities;

use Modules\Support\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Lecturer\Admin\LecturerTable;
use Modules\Media\Eloquent\HasMedia;
use Modules\Support\Eloquent\Sluggable;
use Modules\Media\Entities\File;
use TypiCMS\NestableTrait;
use Illuminate\Support\Facades\Cache;
use Modules\Product\Entities\Product;

class Lecturer extends Model
{
    use SoftDeletes,
        HasMedia,
        Sluggable,
        NestableTrait;
    protected $table = 'lecturers';

    protected $fillable = [
        'name',
        'slug',
        'certificate',
        'description',
        'qualifications',
        'phone',
        'email',
        'social_fb',
        'social_twitter',
        'social_instagram',
        'is_active'
    ];

    /**
     * The attribute that will be slugged.
     *
     * @var string
     */
    protected $slugAttribute = 'name';

    protected $appends = [
        'base_image'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];


    protected static function booted()
    {
        static::addActiveGlobalScope();
    }

    public function scopeWithBaseImage($query)
    {
        $query->with(['files' => function ($q) {
            $q->wherePivot('zone', 'base_image');
        }]);
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

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_lecturers')->withTimestamps();
    }


    public function table()
    {
        return new LecturerTable($this->newQuery()->withoutGlobalScope('active'));
    }

    public static function treeList()
    {
        return Cache::tags('lecturers')->rememberForever(md5('lecturers.tree_list:' . locale()), function () {
            return static::orderByRaw('-id DESC')
                ->get()
                ->nest()
                ->setIndent('¦–– ')
                ->listsFlattened('name');
        });
    }

}
