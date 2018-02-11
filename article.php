<?php

require_once 'autoload.php';

$id = filter_input(INPUT_GET, 'id');

$view          = new \App\View();
$view->article = \App\Models\News::findById($id);

if ($view->article) {
    $view->display('article');
} else {
    echo 'Page not found!';
}
