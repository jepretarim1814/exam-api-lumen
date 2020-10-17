<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group([
    'middleware' => ['cors'],
    'prefix' => 'user'
], function () use ($router) {
    $router->post('/login', 'AuthController@login');
    $router->post('/register', 'AuthController@register');
    $router->get('/search', 'UserController@allUsers');
    $router->post('/logout', 'AuthController@logout');
});

$router->group([
    'prefix' => 'token'
], function () use ($router) {
    $router->get('/refresh', 'AuthController@refreshToken');
    $router->get('/generate_captcha', 'CaptchaController@generate');
});
