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

// Root route (from before - keep it)
$router->get('/', function () use ($router) {
    return response()->json([
        'message' => 'Lumen API is working'
    ]);
});

// Step 3: Member API routes
$router->group(['prefix' => 'api'], function () use ($router)
{
    $router->get('members', ['uses' => 'MemberController@showAllMembers']);
    $router->get('members/{id}', ['uses' => 'MemberController@showOneMember']);
});