<?php

namespace Modules\Area\Entities;

use Modules\Support\Eloquent\Model;
use Modules\Service\Entities\Service;
use Modules\Core\Entities\Province;
use TypiCMS\NestableTrait;
use Illuminate\Support\Facades\Cache;
use Modules\Area\Admin\AreaProvinceTable;

class AreaProvince extends Model
{
    use NestableTrait;


    protected $table = 'area_province';

    protected $fillable = [
        'area_id',
        'province_id',
    ];
    public function areas()
    {
        return $this->hasMany(Area::class, 'area_id', 'id');
    }

    public function provinces()
    {
       return $this->hasMany(Province::class, 'province_id', 'id');
    }

    public function table()
    {
        return new AreaProvinceTable($this->newQuery()->withoutGlobalScope('active'));
    }

    // public static function treeList()
    // {
    //     return Cache::tags('areas')->rememberForever(md5('areas.tree_list:' . locale()), function () {
    //         return static::get()
    //             ->nest()
    //             ->setIndent('¦–– ')
    //             ->listsFlattened('name');
    //     });
    // }
}
