<?php

namespace FleetCart\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheResponse
{
    // Thời gian cache (giây)
    protected $cacheTime = 86400; // 24h

    public function handle($request, Closure $next)
    {
        // Chỉ cache GET request
        if (!$request->isMethod('get')) {
            return $next($request);
        }

        // Tạo key duy nhất theo URL
        $key = 'response_cache:' . $request->fullUrl();

        // Nếu có cache thì trả về luôn
        if (Cache::has($key)) {
            return response(Cache::get($key));
        }

        // Nếu chưa có cache thì render và lưu
        $response = $next($request);

        // Chỉ cache HTML (không cache JSON, file, v.v.)
        if ($response->headers->get('content-type') === 'text/html; charset=UTF-8') {
            Cache::put($key, $response->getContent(), $this->cacheTime);
        }

        return $response;
    }
}
