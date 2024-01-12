<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\Model;

class District extends Model {

    protected $table = 'districts';
    
    public function provinces() {

        return $this->belongsTo(Province::class);

    }
}