<?php

require_once __DIR__ . '/../../autoload.php';

$user = \App\Models\Users::findById(1);

$user->name = 'testupdate3';
$user->email = 'testupdate3@test.test';

$user->save();


$user2 = new \App\Models\Users();
$user->name = 'testsave';
$user->email = 'testsave@test.test';
$user->save();

var_dump(\App\Models\Users::fetchAll());
