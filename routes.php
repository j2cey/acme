<?php

// registration routes
$router->map('GET', '/register', 'Acme\Controllers\RegisterController@getShowRegisterPage', 'register');
$router->map('POST', '/register', 'Acme\Controllers\RegisterController@postShowRegisterPage', 'register_post');
$router->map('GET', '/verify-account', 'Acme\Controllers\RegisterController@getVerifyAccount', 'verify_account');

// Testimonial routes
$router->map('GET', '/testimonials', 'Acme\Controllers\TestimonialController@getShowTestimonials', 'testimonials');

// logged in user routes
if (Acme\Auth\LoggedIn::user()) {
  $router->map('GET', '/add-testimonial', 'Acme\Controllers\TestimonialController@getShowAdd', 'add_testimonial');
  $router->map('POST', '/add-testimonial', 'Acme\Controllers\TestimonialController@postShowAdd', 'add_testimonial_post');
}

// login/logout routes
$router->map('GET', '/login', 'Acme\Controllers\AuthenticationController@getShowLoginPage', 'login');
$router->map('POST', '/login', 'Acme\Controllers\AuthenticationController@postShowLoginPage', 'login_post');
$router->map('GET', '/logout', 'Acme\Controllers\AuthenticationController@getLogout', 'logout');

// admin routes
if ((Acme\Auth\LoggedIn::user()) && (Acme\Auth\LoggedIn::user()->access_level == 2)) {
  $router->map('POST', '/admin/page/edit', 'Acme\Controllers\AdminController@postSavePage', 'save_page');
  $router->map('GET', '/admin/page/add', 'Acme\controllers\AdminController@getAddPage', 'add_page');
}

// page routes
$router->map('GET', '/', 'Acme\Controllers\PageController@getShowHomePage', 'home');
$router->map('GET', '/page-not-found', 'Acme\Controllers\PageController@getShow404', '404');
$router->map('GET', '/[*]', 'Acme\Controllers\PageController@getShowPage', 'generic_page');


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
