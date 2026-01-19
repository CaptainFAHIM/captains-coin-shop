<?php
class AssetController
{
    public function css()
    {
        header('Content-Type: text/css');
        readfile(__DIR__ . '/../../public/assets/css/style.css');
        exit;
    }
    public function js()
    {
        header('Content-Type: application/javascript');
        readfile(__DIR__ . '/../../public/assets/js/app.js');
        exit;
    }
}
