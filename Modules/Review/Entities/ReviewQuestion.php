<?php

namespace Modules\Review\Entities;

use Illuminate\Http\Request;
use Modules\Admin\Ui\AdminTable;
use Modules\Support\Eloquent\Model;
use Modules\Review\Admin\ReviewQuestionTable;


class ReviewQuestion extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    // protected $guarded = [];

    protected $table = "review_questions";
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
    
    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */

    public function table(Request $request)
    {
        return new AdminTable($this->newQuery());
    }
}
