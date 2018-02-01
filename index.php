<?php

require_once 'autoload.php';

$db = new \App\Db();

//var_dump(\App\Models\News::getLastNews());
include __DIR__ . '/App/views/home.php';
