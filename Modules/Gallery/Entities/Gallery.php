<?php

namespace Modules\Gallery\Entities;

use Modules\Admin\Ui\AdminTable;
use Modules\Support\Eloquent\Model;
use Modules\Media\Eloquent\HasMedia;
use Modules\Support\Eloquent\Sluggable;
class Gallery extends Model
{
    use HasMedia, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];
    /**
     * The attribute that will be slugged.
     *
     * @var string
     */
    protected $slugAttribute = 'name';

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

    /**
     * Get table data for the resource
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function table($request)
    {
        return new AdminTable($this->newQuery());
    }
}
