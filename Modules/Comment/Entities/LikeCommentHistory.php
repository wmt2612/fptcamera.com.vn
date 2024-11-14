<?php

namespace Modules\Comment\Entities;

use Illuminate\Database\Eloquent\Model;

class LikeCommentHistory extends Model
{
    const IP_ADDRESS = 'ip_address';
    const ID = 'id';
    const COMMENT_ID = 'comment_id';

    protected $fillable = [
        self::COMMENT_ID,
        self::IP_ADDRESS
    ];
}
