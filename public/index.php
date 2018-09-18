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
 * @varIlluminate\Container\Application
 */
$app = require_once __DIR__.'/../bootstrap/app.php';

/**
 * Http Kernel
 *
 * @var App\Http\Kernel
 */
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);


/**
 * Http Response
 *
 * @var Illuminate\Http\Response
 * @see https://github.com/laravel-book/framework/blob/5.7/src/Illuminate/Foundation/Http/Kernel.php#L111 for handle method details
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
