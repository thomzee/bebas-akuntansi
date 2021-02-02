<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const ADMIN_PREFIX = 'admin::';

    protected function share(array $prop)
    {
        view()->share('menu', $prop['menu']);
        view()->share('slug', $prop['slug']);
        view()->share('route', self::ADMIN_PREFIX . $prop['slug']);
        view()->share('view', $prop['view']);
    }
}
