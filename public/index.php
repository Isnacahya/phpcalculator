<?php

->namespace('jakmall\Recruitmet\Calculator\Http\Controller')
->group(
    function (\Illuminate\Routing\Router $router) {
    $router->get('/', 'HistoryController@index');
    $router->get('/{id}', 'HistoryController@show');
    $router->delete('/{id}', 'HistoryController@remove');
    $router->post('/{action}', 'CalculatorController@calculate');
    }
);

$request = Request::capture();
$request->server->set('SCRIPT_FILENAME', '/index.php');
$container->bind(
    Illuminate\Http\Request::class,
    function () use ($request) {
        return $request;
    }
);

$response = $router->dispatch($request);

$response->send();





?>
