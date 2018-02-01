<?php

require_once 'autoload.php';

//$db = new \App\Db();
$news = \App\Models\News::getLastNews();

//var_dump(\App\Models\News::getLastNews());
include __DIR__ . '/App/views/home.php';
