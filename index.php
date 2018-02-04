<?php

require_once 'autoload.php';

$news = \App\Models\News::getLastNews();

include __DIR__ . '/App/views/home.php';
