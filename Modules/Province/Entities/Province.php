<?php

namespace Modules\Province\Entities;

use Modules\Area\Entities\AreaProvince;
use Modules\Core\Entities\District;
use Modules\Province\Admin\ProvinceTable;
use Modules\Service\Entities\Service;
use Modules\Support\Eloquent\Model;
use TypiCMS\NestableTrait;

class Province extends Model
{
    use NestableTrait;

    protected $table = 'provinces';

    protected $fillable = [
        'name',
        'area_id',
    ];

    public $timestamps = false;

    public function districts()
    {
        return $this->hasMany(District::class, 'province_id');
    }

    public function areaProvince()
    {
        return $this->belongsToMany(AreaProvince::class);
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

    public function services()
    {
        return $this->belongsToMany(Service::class, 'area_services')->withPivot('price_area');
    }

    public function provinces()
    {
        return $this->hasMany(Province::class, 'area_id');
    }

    public function table()
    {
        return new ProvinceTable($this->newQuery()->withoutGlobalScope('active'));
    }
}
