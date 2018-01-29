<?php

require_once __DIR__ . '/../../autoload.php';


$db = new \App\Db();

$users = \App\Models\Users::findById(3);

var_dump($users);

$users = \App\Models\Users::findById(9999999);

var_dump($users);