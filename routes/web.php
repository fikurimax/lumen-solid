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
    "namespace" => "Todo",
    "prefix"    => "todo"
], function($router) {
    // We just simply call a method we created on the trait
    $router->get("/", "TodoController@readMany");
    $router->get("/{id}", "TodoController@read");
    $router->post("/", "TodoController@create");
    // if u use patch method u should change the header content-type disposition to application/x-www-form-urlencoded on your request
    // if u want to use form-data header, u should use post instead of patch and attach _method on your request
    // see https://laravel.com/docs/8.x/routing#form-method-spoofing
    $router->patch("/", "TodoController@update");
    $router->delete("/", "TodoController@delete");
});