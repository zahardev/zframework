<?php

require_once __DIR__ . '/../../autoload.php';

$query = "SELECT * from `users` where id IN (%d, %d, %d);";

$db = new \App\Db();

$res = $db->getResults($query, \App\Models\Users::class, [1, 3, 5]);

var_dump($res);
