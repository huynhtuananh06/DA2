<?php
$default_controller = 'login';
$default_action = 'index';

if(isset($_SESSION['user']['userID'])) {
    $default_controller ='home';
    $default_action = 'index';
}
if(isset($_SESSION['user']['adminID'])) {
    $default_controller ='admin';
    $default_action = 'tour';
}
$controller = isset($_GET['controller']) ? $_GET['controller'] : $default_controller;
$action     = isset($_GET['action']) ? $_GET['action'] : $default_action;

$controllerName = ucfirst($controller) . 'Controller';
$controllerFile = 'controllers/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerObj = new $controllerName();

    // 👉 Thêm dòng này để lấy id
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    // Kiểm tra method (action)
    if (method_exists($controllerObj, $action)) {
        // 👉 Nếu có id thì truyền vào, nếu không thì gọi bình thường
        if ($id !== null) {
            $controllerObj->$action($id);
        } else {
            $controllerObj->$action();
        }
    } else {
        // echo "❌ Không tìm thấy action: $action";
        require_once 'views/error.php'; 
        exit();
    }
} else {
    echo "❌ Không tìm thấy controller: $controllerName";
}