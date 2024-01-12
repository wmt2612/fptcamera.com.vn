<?php

use Modules\Media\Entities\File;
use Illuminate\Support\Facades\Cache;

if( !function_exists('getImage') )
{
    function getImage($fileId)
    {
        return Cache::rememberForever(md5("files.{$fileId}"), function () use ($fileId) {
            return File::findOrNew($fileId)->path;
        });
    }
}
