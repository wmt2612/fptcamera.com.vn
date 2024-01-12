<?php

namespace Modules\Area\Entities;

use Modules\Support\Eloquent\Model;
use Modules\Service\Entities\Service;
use Modules\Area\Admin\AreaTable;
use Modules\Core\Entities\Province;
use TypiCMS\NestableTrait;
use Illuminate\Support\Facades\Cache;


class Area extends Model
{
    use NestableTrait;

    protected $table = 'areas';

    protected $fillable = [
        'name',
        'description'
    ];
    public function services()
    {
        return $this->belongsToMany(Service::class, 'area_services')->withPivot('price_area');
    }

    public function provinces() {

        return $this->belongsToMany(Province::class, 'area_province', 'area_id');
        
    }

    public function areaProvince()
    {
       return $this->hasMany(AreaProvince::class, 'area_id');
    }

    public function table()
    {
        return new AreaTable($this->newQuery()->withoutGlobalScope('active'));
    }

    public static function treeList()
    {
        return Cache::tags('areas')->rememberForever(md5('areas.tree_list:' . locale()), function () {
            return static::get()
                ->nest()
                ->setIndent('¦–– ')
                ->listsFlattened('name');
        });
    }
}
