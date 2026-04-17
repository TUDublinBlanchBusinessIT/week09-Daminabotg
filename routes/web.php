<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return response()->json([
        'message' => 'Lumen API is working'
    ]);
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('members', ['uses' => 'MemberController@showAllMembers']);
    $router->get('members/{id}', ['uses' => 'MemberController@showOneMember']);
    $router->get('member/{id}/bookings', ['uses' => 'MemberController@showMemberBookings']);

    $router->post('members', ['uses' => 'MemberController@create']);
    $router->put('members/{id}', ['uses' => 'MemberController@update']);
    $router->delete('members/{id}', ['uses' => 'MemberController@delete']);
});