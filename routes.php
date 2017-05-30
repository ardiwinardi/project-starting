<?php
/*
	\d+ = One or more digits (0-9)
	\w+ = One or more word characters (a-z 0-9 _)
	[a-z0-9_-]+ = One or more word characters (a-z 0-9 _) and the dash (-)
	.* = Any character (including /), zero or more
	[^/]+ = Any character but /, one or more
*/

$router->get('/', 'FooController@index');
$router->get('/home', 'FooController@index');

$router->get('/foo', 'FooController@index');
$router->get('/add', 'FooController@add');
$router->post('/add', 'FooController@add');
$router->get('/edit/(\w+)', 'FooController@edit');
$router->post('/edit/(\w+)', 'FooController@edit');



$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');
$router->get('/profil', 'UserController@edit');
$router->post('/profil', 'UserController@edit');


$router->run();

?>
