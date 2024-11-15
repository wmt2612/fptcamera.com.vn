<?php

namespace Modules\Comment\Entities;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Modules\Post\Entities\Post;
use Modules\Product\Entities\Product;
use Modules\Support\Eloquent\Model;
use Modules\Support\Eloquent\Translatable;
use Modules\User\Entities\User;

class Comment extends Model
{
    const TABLE_NAME = 'comments';

    const ID = 'id';
    const USER_ID = 'user_id';
    const CUSTOMER_NAME = 'customer_name';
    const CUSTOMER_EMAIL = 'customer_email';
    const CUSTOMER_PHONE = 'customer_phone';
    const CUSTOMER_GENDER = 'customer_gender';
    const CONTENT = 'content';
    const TOTAL_LIKE = 'total_like';
    const REPLY_ID = 'reply_id';
    const URL = 'url';
    const POST_ID = 'post_id';
    const REPLY_TO = 'reply_to';
    const CREATED_AT = 'created_at';

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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::REPLY_ID,
        self::CUSTOMER_NAME,
        self::CUSTOMER_GENDER,
        self::CUSTOMER_EMAIL,
        self::CUSTOMER_PHONE,
        self::STATUS,
        self::TYPE,
        self::CONTENT,
        self::TOTAL_LIKE,
        self::POST_ID,
        self::URL,
        self::USER_ID,
        self::REPLY_TO,
        'created_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    protected $appends = [
        'avt_letters',
        'is_admin',
        'raw_created_at'
    ];

    public static function booted()
    {
        static::created(function($comment) {

        });
    }

    public function getRawCreatedAtAttribute()
    {
        return $this->getRawOriginal('created_at');
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

    public function replies()
    {
        return $this->hasMany(Comment::class, Comment::REPLY_ID, self::ID)
            ->orderBy('created_at');
    }

    public function replyTo()
    {
        return $this->belongsTo(Comment::class, self::REPLY_TO, self::ID);
    }

    public function scopeActive($query)
    {
        return $query->where(Comment::STATUS, Comment::APPROVED);
    }

    public function scopeFilterByType($query, $type, $url, $postId)
    {
        if ($type == Comment::TYPE_URL) {
            return $query
                ->where(Comment::TYPE, Comment::TYPE_URL)
                ->where(Comment::URL, $url);
        }

        return $query
            ->where(Comment::TYPE, $type)
            ->where(Comment::POST_ID, $postId);
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->when($keyword, function ($query) use ($keyword) {
            $query->where(self::CUSTOMER_NAME, 'LIKE', '%' . $keyword . '%')
                ->orWhere(self::CONTENT, 'LIKE', '%' . $keyword . '%');
        });
    }

    public function likeHistories()
    {
        return $this->hasMany(LikeCommentHistory::class, LikeCommentHistory::COMMENT_ID, self::ID);
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
}
