<?php

require_once 'autoload.php';

$newsController = new \App\Controllers\NewsController();

$newsController->action('Index');

