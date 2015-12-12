<?php

$router->map('GET', '/', 'Acme\Controllers\PageController@getShowHomePage', 'home');

$router->map('GET', '/register', 'Acme\Controllers\RegisterController@getShowRegisterPage', 'register');

$router->map('POST', '/register', 'Acme\Controllers\RegisterController@postShowRegisterPage', 'register_post');

$router->map('GET', '/login', 'Acme\Controllers\RegisterController@getShowLoginPage', 'login');

$router->map('GET', '/about', 'Acme\Controllers\PageController@getShowPage', 'generic_page');


// $router->map('GET', '/', function() {
//   include(__DIR__ . "/../views/home.php");
// });
//
// $router->map('GET', '/register', function() {
//   include(__DIR__ . "/../views/register.php");
// });
//
// $router->map('POST', '/register', function() {
//   include(__DIR__ . "/../views/doRegister.php");
// });
//
// $router->map('GET', '/login', function() {
//   include(__DIR__ . "/../views/login.html");
// });
//
// $match = $router->match();
//
// if ($match && is_callable($match['target'])){
//   call_user_func_array($match['target'],$match['params']);
// }else{
//   // no matching route found!
//   header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
// }
//
// $url = explode('/',$_SERVER['REQUEST_URI']);

//var_dump($url);

// if($url[1] == "") {
//   // display a home page
//   include( __DIR__ . "/../views/home.php");
//   exit();
// }else if($url[1] == "register") {
//   // display the register page
//   include( __DIR__ . "/../views/register.php");
//   exit();
// }else if($url[1] == "login") {
//   // display the login page
//   include( __DIR__ . "/../views/login.html");
//   exit();
// }
