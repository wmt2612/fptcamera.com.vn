<?php

namespace Modules\Tagp\Entities;

use Modules\Support\Eloquent\Model;
use Modules\Support\Eloquent\Translatable;
use Modules\Admin\Ui\AdminTable;
use Illuminate\Support\Facades\Cache;
use Modules\Support\Eloquent\Sluggable;
use Modules\Post\Entities\Post;

class TagP extends Model
{
    use Translatable, Sluggable;

    protected $table = 'tag_ps';

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];

     /**
     * The attribute that will be slugged.
     *
     * @var string
     */
    protected $slugAttribute = 'name';


    /**
     * Find a tag by the given slug.
     *
     * @param string $slug
     * @return self
     */
    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->firstOrFail();
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags', 'tag_p_id', 'post_id');
    }

     /**
     * Get table data for the resource
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function table()
    {
        return new AdminTable($this->query());
    }

}
