<?php
session_start();
require __DIR__ . '/config/config.php';
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/core/' . $class . '.php',
        __DIR__ . '/app/controllers/' . $class . '.php',
        __DIR__ . '/app/models/' . $class . '.php',
    ];
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require $path;
            return;
        }
    }
});
$page = isset($_GET['page']) ? trim($_GET['page']) : 'home';
$map = [
    'home' => ['HomeController', 'index'],
    'game' => ['GameController', 'show'],
    'order_create' => ['OrderController', 'create'],
    'contact' => ['ContactController', 'index'],
    'contact_submit' => ['ContactController', 'submit'],
    'auth_login' => ['AuthController', 'login'],
    'auth_doLogin' => ['AuthController', 'doLogin'],
    'auth_logout' => ['AuthController', 'logout'],
    'admin_dashboard' => ['AdminController', 'dashboard'],
    'admin_games' => ['AdminController', 'games'],
    'admin_addGame' => ['AdminController', 'addGame'],
    'admin_deleteGame' => ['AdminController', 'deleteGame'],
    'admin_orders' => ['AdminController', 'orders'],
    'admin_completeOrder' => ['AdminController', 'completeOrder'],
    'admin_admins' => ['AdminController', 'admins'],
    'admin_addAdmin' => ['AdminController', 'addAdmin'],
    'admin_deleteAdmin' => ['AdminController', 'deleteAdmin'],
    'admin_messages' => ['AdminController', 'messages'],
    'asset_css' => ['AssetController', 'css'],
    'asset_js' => ['AssetController', 'js'],
];
if (!isset($map[$page])) {
    http_response_code(404);
    echo 'Page not found';
    exit;
}
[$controllerName, $action] = $map[$page];
if (!class_exists($controllerName)) {
    http_response_code(500);
    echo 'Controller missing';
    exit;
}
$controller = new $controllerName();
if (!method_exists($controller, $action)) {
    http_response_code(500);
    echo 'Action missing';
    exit;
}
$controller->$action();
