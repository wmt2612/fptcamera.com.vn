<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\Model;
use TypiCMS\NestableTrait;
use Illuminate\Support\Facades\Cache;
use Modules\Area\Entities\Area;

class Province extends Model {

    use NestableTrait;

    protected $table = 'provinces';

    public function districts() {
       return $this->hasMany(District::class, 'province_id');
    }

    public function areas() {
        return $this->belongsToMany(Area::class, 'area_province', 'province_id');
    }

    public static function treeList()
    {
        return Cache::tags('provinces')->rememberForever(md5('provinces.tree_list:' . locale()), function () {
            return static::get()
                ->nest()
                ->setIndent('¦–– ')
                ->listsFlattened('name');
        });
    }
}
