<?php

namespace Modules\Rating\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Modules\Comment\Jobs\SendCommentDataToSheet;
use Modules\Media\Eloquent\HasMedia;
use Modules\Media\Entities\File;
use Modules\Post\Entities\Post;
use Modules\Product\Entities\Product;
use Modules\Rating\Jobs\SendReviewDataToSheet;
use Modules\User\Entities\User;

class Rating extends Model
{
    use HasFactory, HasMedia;

    const TABLE_NAME = 'ratings';
    const ID = 'id';
    const CUSTOMER_NAME = 'customer_name';
    const CUSTOMER_PHONE = 'customer_phone';
    const CUSTOMER_EMAIL = 'customer_email';
    const CUSTOMER_GENDER = 'customer_gender';
    const REVIEW = 'review';
    const RATING = 'rating';
    const URL = 'url';
    const POST_ID = 'post_id';
    const PRODUCT_ID = 'product_id';

    /**
     * Type of rating
     *  Values:
     *  1. URL
     *  2. Post ID
     */
    const TYPE = 'type';
    const TYPE_URL = 1;
    const TYPE_POST_ID = 2;
    const TYPE_PRODUCT_ID = 3;
    /**
     * Status of rating
     *  Values:
     *  1. Approved
     *  2. Rejected
     *  3. Pending
     */
    const STATUS = 'status';
    const APPROVED = 1;
    const REJECTED = 2;
    const PENDING = 3;

    const TOTAL_LIKE = 'total_like';
    const REPLY_ID = 'reply_id';
    const USER_ID = 'user_id';

    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::CUSTOMER_NAME,
        self::CUSTOMER_PHONE,
        self::CUSTOMER_EMAIL,
        self::CUSTOMER_GENDER,
        self::STATUS,
        self::REVIEW,
        self::RATING,
        self::TYPE,
        self::TOTAL_LIKE,
        self::REPLY_ID,
        self::URL,
        self::POST_ID,
        self::USER_ID,
    ];

    protected $appends = [
        'avt_letters',
        'is_admin',
        'photos'
    ];

    public static function booted()
    {
        static::created(function($rating) {

        });
    }

    public function getCreatedAtAttribute($value)
    {
        Carbon::setLocale('vi');
        $createdAt = Carbon::parse($value);
        return $createdAt->diffForHumans(Carbon::now());
    }

    public function getAvtLettersAttribute()
    {
        $letters = '';
        $words = preg_split("/[\s,_-]+/", $this->customer_name);
        foreach ($words as $word) {
            $firstLetter = mb_strimwidth($word, 0, 1);
            $letters .= strtoupper($firstLetter);
        }
        return $letters;
    }

    public function likeHistories()
    {
        return $this->hasMany(LikeRatingHistory::class, LikeRatingHistory::RATING_ID, self::ID);
    }

    public function replies()
    {
        return $this->hasMany(Rating::class, Rating::REPLY_ID, self::ID);
    }

    public function scopeActive($query)
    {
        return $query->where(Rating::STATUS, Rating::APPROVED);
    }

    public function scopeFilterByType($query, $type, $url, $postId)
    {
        if ($type == Rating::TYPE_URL) {
            return $query
                ->where(Rating::TYPE, Rating::TYPE_URL)
                ->where(Rating::URL, $url);
        }
        return $query
            ->where(Rating::TYPE, $type)
            ->where(Rating::POST_ID, $postId);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getIsAdminAttribute()
    {
        $user = $this->user()->first();
        if($user) {
            return $user->isAdmin() || $user->isEditor();
        }
        return false;
    }

    public function post()
    {
        return $this->belongsTo(Post::class, self::POST_ID, 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, self::POST_ID, 'id');
    }

    public function link()
    {
        if ($this->type == self::TYPE_URL) {
            return URL::to($this->url);
        }
        if ($this->type == self::TYPE_PRODUCT_ID) {
            return route('product.single', ['slug' => $this->product()->first()->slug]);
        }
        return route('blog.category', ['slug' => $this->post()->first()->slug]);
    }

    public function getPhotosAttribute()
    {
        return $this->files->where('pivot.zone', 'review_photo');
    }
}
