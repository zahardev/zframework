<?php

require_once 'autoload.php';

$news = \App\Models\News::getLastNews();

$view = new App\View();
$view->news = $news;

$view->display('home');

