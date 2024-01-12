<?php

namespace Modules\Contact\Entities;

use Illuminate\Http\Request;
use Modules\Admin\Ui\AdminTable;
use Modules\Support\Eloquent\Model;

class Contacts extends Model
{

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $table = 'contacts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'content', 'is_reading'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatedAttributes = [];

    public function table(Request $request)
    {
        return new AdminTable($this->newQuery());
    }

}
