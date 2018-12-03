<?php

namespace App\Libs\JWTAuth;

use Tymon\JWTAuth\Providers\Storage\Illuminate;
use Illuminate\Contracts\Cache\Repository as CacheContract;

class Storage extends Illuminate
{
	/**
     * Constructor.
     *
     * @param  \Illuminate\Contracts\Cache\Repository  $cache
     *
     * @return void
     */
    public function __construct(CacheContract $cache)
    {
        $this->cache = $cache;

        $this->tag = config('jwt.tag');
    }
}