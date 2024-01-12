<?php

namespace Modules\Comment\Entities;

use Illuminate\Http\Request;
use Modules\Admin\Ui\AdminTable;
use Modules\Post\Entities\Post;
use Modules\Product\Entities\Product;
use Modules\Support\Eloquent\Model;
use Modules\Support\Eloquent\Translatable;

class Comment extends Model
{

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $table = "comments";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'product_id',
       'post_id',
        'name',
        'email',
        'gender',
        'image',
        'comment',
        'is_approved',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */

    public function table(Request $request)
    {
        return new AdminTable($this->newQuery());
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

}
