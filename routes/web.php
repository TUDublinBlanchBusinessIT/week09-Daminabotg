<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
|
*/

$router->get('/', function () use ($router) {
    return response()->json([
        'message' => 'Lumen API is working'
    ]);
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('members', ['uses' => 'MemberController@showAllMembers']);
    $router->get('members/{id}', ['uses' => 'MemberController@showOneMember']);
    $router->get('member/{id}/bookings', ['uses' => 'MemberController@showMemberBookings']);
});