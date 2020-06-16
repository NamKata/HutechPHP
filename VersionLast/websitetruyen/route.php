<?php

// $request = $_SERVER['REQUEST_URI'];

// switch ($request) {
//     case '/' :
//         require __DIR__ . '/websitetruyen/home.html';
//         break;
//     // case '' :
//     //     require __DIR__ . '/views/index.php';
//     //     break;
//     // case '/about' :
//     //     require __DIR__ . '/views/about.php';
//     //     break;
//     default:
//         http_response_code(404);
//         require __DIR__ . '/views/404.php';
//         break;
// }
$routes = [];
function route($action, $callback){
    global $routes;
    $action = trim($action, '/');
    $routes[$action] = $callback;
}
function dispath($action){
    global $routes;
    $action = trim($action, '/');
    
    $callback = $routes[$action];
    echo call_user_func($callback);
}