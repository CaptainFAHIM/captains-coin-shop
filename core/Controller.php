<?php
class Controller
{
    protected function render($view, $data = [])
    {
        extract($data);
        $viewFile = __DIR__ . '/../app/views/' . $view . '.php';
        require __DIR__ . '/../app/views/layout/header.php';
        if (file_exists($viewFile)) {
            require $viewFile;
        } else {
            echo 'View not found';
        }
        require __DIR__ . '/../app/views/layout/footer.php';
    }
    protected function redirect($route)
    {
        header('Location: ' . BASE_URL . '?page=' . $route);
        exit;
    }
}
