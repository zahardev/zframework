<?php

require_once __DIR__ . '/../../autoload.php';

$query = "INSERT INTO `users` (`name`, `email`) VALUES (':name', ':email');";

$db = new \App\Db();

$values = [':name' => 'testexec', ':email' => 'testexec@test.test'];

$db->exec($query, $values);

$users = \App\Models\Users::fetchAll();

var_dump($users);
