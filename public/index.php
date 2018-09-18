<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/**
 * Container
 *
 * Illuminate\Container\Application
 */
$app = require_once __DIR__.'/../bootstrap/app.php';

/**
 * Http Kernel
 *
 * App\Http\Kernel
 */
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);


/**
 * Http Response
 *
 * Illuminate\Http\Response
 */
$response = $kernel->handle(
    /**
     * Http Request
     *
     * Illuminate\Http\Request
     */
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
