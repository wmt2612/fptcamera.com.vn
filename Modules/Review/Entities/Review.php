<?php

namespace Modules\Review\Entities;

use Illuminate\Http\Request;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\DB;
use Modules\Support\Eloquent\Model;
use Modules\Product\Entities\Product;
use Modules\Review\Admin\ReviewTable;

class Review extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    // protected $guarded = [];


    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'reviewer_id',
        'product_id',
        'rating',
        'reviewer_name',
        'reviewer_email',
        'comment',
        'reviewer_phone',
        'available_reviews',
        'image',
        'is_approved',
        'introduce',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_approved' => 'boolean',
        'introduce' => 'boolean',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['rating_percent', 'created_at_formatted'];

    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('approved', function ($query) {
            $query->where('is_approved', true);
        });
    }

    public static function countAndAvgRating(Product $product)
    {
        return self::select(DB::raw('count(*) as count, avg(rating) as avg_rating'))
            ->where('product_id', $product->id)
            ->first();
    }

    public function getAvgRatingAttribute($avgRating)
    {
        return $avgRating ?: 0;
    }

    public function getRatingPercentAttribute()
    {
        return ($this->rating / 5) * 100;
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at;
    }

    public function getDateAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }

    public function children()
    {
        return $this->hasOne(Review::class, 'parent_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    /**
     * Get table data for the resource
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function table(Request $request)
    {
        $query = static::withoutGlobalScope('approved')
            ->with(['product' => function ($query) {
                $query->withoutGlobalScope('active');
            }])
            ->when($request->productId, function ($query) use ($request) {
                return $query->where('product_id', $request->productId);
            });

        return new ReviewTable($query);
    }

    public function getIdReviewQuestions()
    {
        $array = json_decode($this->available_reviews, true) ?? [];
        return array_keys($array);
    }

    public function getAnswerReviewQuestions()
    {
        $array = json_decode($this->available_reviews, true);
        return array_values($array);
    }

    public function getReviewQuestions()
    {
        return ReviewQuestion::whereIn('id', $this->getIdReviewQuestions())
                            ->get();
    }
}
