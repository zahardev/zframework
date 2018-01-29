<?php

require_once __DIR__ . '/../../autoload.php';

$query = "INSERT INTO `users` (`id`, `name`, `email`) VALUES (NULL, '%s', '%s');";

$db = new \App\Db();

$db->exec($query, ['user5', 'user5@test.test']);

$users = \App\Models\Users::fetchAll();

var_dump($users);
